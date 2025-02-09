<?php

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

uses(TestCase::class);

it('returns a paginated list of projects', function () {

    $response = $this->getJson('/api/project?page=1');

    $response->assertStatus(200);

    $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['data', 'current_page', 'last_page', 'per_page', 'total'])
            ->where('current_page', 1)
            ->where('per_page', 10) 
            ->etc()
    );

    expect($response->json('data'))->toHaveCount(10);
});


it('defaults to page 1 when an invalid page is provided', function () {
    $response = $this->getJson('/api/project?page=-1');

    $response->assertStatus(200);

    expect($response->json('current_page'))->toBe(1);
});

it('returns an empty data array when page is out of range', function () {

    $response = $this->getJson('/api/project?page=13');

    $response->assertStatus(200);

    expect($response->json('data'))->toBeArray()->toBeEmpty();
});

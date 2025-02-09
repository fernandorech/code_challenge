<?php

use Tests\TestCase;

uses(TestCase::class);

it('logs in successfully with correct credentials', function () {

    $response = $this->postJson('/api/login', [
        'email' => 'a1@as.com',
        'password' => '123456',
    ]);

    $response->assertStatus(200);

    $response->assertJsonStructure([
        'token',
        'user' => ['id', 'name', 'email'],
    ]);

    $response->assertJson(fn ($json) =>
        $json->has('token')->etc()
    );
});


it('returns an error when credentials are incorrect', function () {
    $response = $this->postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertStatus(401);

    $response->assertJson([
        'message' => 'Unauthorized',
    ]);
});

it('fails validation when required fields are missing', function () {

    $response = $this->postJson('/api/login', [
        'email' => '',  // E-mail vazio
        'password' => '',  // Senha vazia
    ]);

    $response->assertStatus(422);

    $response->assertJsonValidationErrors(['email', 'password']);
});

it('fails validation with invalid email format', function () {

    $response = $this->postJson('/api/login', [
        'email' => 'invalidemail',
        'password' => 'password123',
    ]);

    
    $response->assertStatus(422);

    $response->assertJsonValidationErrors(['email']);
});

it('fails validation when password is missing', function () {

    $response = $this->postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => '',
    ]);

    $response->assertStatus(422);

    $response->assertJsonValidationErrors(['password']);
});

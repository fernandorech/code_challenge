<?php

use App\Repositories\ProjectRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;


uses(TestCase::class);

it('retrieves paginated projects correctly', function () {

    $repository = new ProjectRepository();
    $page = 1;
    $pageSize = 10;

    $paginator = $repository->getPaginatedProjects($page, $pageSize);

    expect($paginator)->toBeInstanceOf(LengthAwarePaginator::class);

    expect($paginator->items())->toHaveCount(10);

    expect($paginator->lastPage())->toBe(10);
});


it('caches paginated projects for 60 minutes', function () {

    $repository = new ProjectRepository();
    $page = 1;
    $pageSize = 10;

    $expectedPaginator = $repository->getPaginatedProjects($page, $pageSize);

    Cache::shouldReceive('remember')
        ->once()
        ->with("projects_page_{$page}", 60, \Closure::class)
        ->andReturn($expectedPaginator);

    $result = $repository->getPaginatedProjects($page, $pageSize);

    expect($result)->toBeInstanceOf(LengthAwarePaginator::class);
});

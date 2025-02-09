<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository
{
    
    /**
     * Gets paginated projects and caches them
     *
     * @param int $page: Page that is going to be retrived
     * @param int $pageSize: Number of items per page (default: 10)
     * @param int $cacheDuration: Time in minutes where the cache expires
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginatedProjects(int $page = 1, int $pageSize = 10, $cacheDuration = 60): LengthAwarePaginator
    {
        return Cache::remember("projects_page_{$page}", $cacheDuration, function () use ($page, $pageSize) {
            return Project::paginate($pageSize, ['*'], 'page', $page);
        });
    }
}
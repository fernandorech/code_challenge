<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use Illuminate\Http\JsonResponse;


class ProjectController extends Controller
{
    
    /**
     * Displays a paginated list of projects.
     * 
     * This method receives a request with a 'page' parameter that determines the page 
     * of the project listing to be returned. If the value of 'page' is invalid (less than 1), 
     * the default value of 1 is used. The function makes a call to the project repository 
     * to get the paginated list of projects and returns that list in JSON format.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Repositories\ProjectRepository $projectRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, ProjectRepository $projectRepository): JsonResponse
    {
        $page = (int) $request->input('page', 1);

        $page = ($page < 0) ? 1 : $page;

        $projects = $projectRepository->getPaginatedProjects($page);

        return response()->json($projects);
    }
}

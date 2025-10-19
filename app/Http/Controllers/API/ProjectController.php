<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies', 'type')->paginate(4);

        return response()->json([

            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with(['technologies', 'type'])->where('slug', $slug)->first();
        //dd($project);

        if ($project) {

            return response()->json([
                'success' => true,
                'result' => $project,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'result' => 'project not found 404',
            ]);
        }
    }
}
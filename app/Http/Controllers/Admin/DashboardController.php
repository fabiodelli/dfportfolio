<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index() 
    {
        $totalProjects = Project::count();
        $totalTechnologies = Technology::count();
        $totalTypes = Type::count();
        
        // Progetti recenti (ultimi 5 modificati o creati)
        $recentProjects = Project::orderByDesc('updated_at')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects', 
            'totalTechnologies', 
            'totalTypes', 
            'recentProjects'
        ));
    }
}
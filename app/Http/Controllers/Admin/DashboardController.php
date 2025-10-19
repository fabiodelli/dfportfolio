<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index(Project $projects) 
    {
        $projects = Project::orderByDesc('id')->paginate(8);
        return view('admin.dashboard', compact('projects'));
    }
}
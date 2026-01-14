<?php

namespace App\Http\Controllers;

use App\Models\Project;

class MissionController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->orderBy('order')->get();

        return view('mission', compact('projects'));
    }
}

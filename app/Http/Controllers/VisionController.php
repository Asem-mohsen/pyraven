<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->orderBy('order')->get();
        
        return view('vision', compact('projects'));
    }
}

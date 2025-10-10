<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->orderBy('order')->get();

        return view('index', compact('projects'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalUsers = User::count();
        $latestProjects = Project::latest()->take(5)->get();
        return view('admin.dashboard', compact('totalProjects', 'totalUsers', 'latestProjects'));
    }
}

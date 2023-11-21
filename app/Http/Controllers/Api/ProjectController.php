<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'sucess',
            'result' => Project::with('technologies', 'type')->orderByDesc('id')->paginate(12)
        ]);
    }
    public function show($slug)
    {
        $project = Project::with('technologies', 'type')->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'result' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Project not found',
            ]);
        }
    }
    public function latest()
    {
        return response()->json([
            'status' => 'sucess',
            'result' => Project::with('technologies', 'type')->orderByDesc('id')->take(3)->get()
        ]);
    }
}

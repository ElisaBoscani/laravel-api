<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $poroject = Project::with('technologies', 'type')->orderByDesc('id')->paginate(12);
        return response()->jason([
            'sucesse' => true,
            'results' => $poroject

        ]);
    }
}

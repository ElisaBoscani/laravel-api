<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    function store(Request $request)
    {
        return response()->json(
            [
                'success' => true,
                'message' => 'Form sent successfully '
            ]
        );
    }
}

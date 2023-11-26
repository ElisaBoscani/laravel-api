<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\API\LeadController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('project', [ProjectController::class, 'index']);
Route::get('project/latest', [ProjectController::class, 'latest']);
Route::get('project/{project:slug}', [ProjectController::class, 'show']);

Route::get('technologes', [TechnologyController::class, 'index']);
Route::get('technologes/{technology:slug}', [TechnologyController::class, 'show']);


Route::post('/contact', [LeadController::class, 'store']);

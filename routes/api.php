<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'user' => $request->user(),
        'csrfToken' => csrf_token(),
    ]);
});


Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});


// Define a route to Fetch Evaluation page
Route::Get('/evaluation_list', [EvaluationController::class, 'Index'])->name('evaluation_list');

// Define a route to Fetch Section List
Route::Get('/section_list', [EvaluationController::class, 'sectionList'])->name('section_list');

// Define a route to Fetch Points List
Route::Get('/points_list', [EvaluationController::class, 'pointsList'])->name('points_list');

// Define a route to Fetch Evaluation History List
Route::Get('/evaluation_history_list', [EvaluationController::class, 'evaluationHistoryList'])->name('evaluation_history_list');

// Define a route to Fetch Points List
Route::Get('/evaluation_details_history_list', [EvaluationController::class, 'evaluationDetailsHistoryList'])->name('evaluation_details_history_list');

// Define a route to Confirm User Evaluation and Transfar Data From Main Evaluation Table To Main Evaluation History
Route::POST('/submit_evaluation', [EvaluationController::class, 'submitEvaluation'])->name('submit_evaluation');

// Define a route to Add New Section
Route::post('/add_new_section', [EvaluationController::class, 'addNewSection'])->name('add_new_section');

// Define a route to Add New Point
Route::post('/add_new_point', [EvaluationController::class, 'addNewPoint'])->name('add_new_point');

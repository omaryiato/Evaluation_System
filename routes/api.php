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
    return $request->user();
});


// Define a route to display Evaluation page
Route::GET('/evaluation_list', [EvaluationController::class, 'index'])->name('evaluation_list');

// Define a route to Confirm User Evaluation
// Route::post('submitEvaluation', [HomeController::class, 'submitEvaluation'])->name('submitEvaluation');

// Define a route to Insert New Section Or New Point
// Route::post('addNewSection', [HomeController::class, 'addNewSection'])->name('addNewSection');

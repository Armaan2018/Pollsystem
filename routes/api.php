<?php

use App\Http\Controllers\Poll\PollController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('v1/create-questions', [PollController::class, 'createQuestion']);

Route::post('v1/create-options', [PollController::class, 'createOption']);


Route::get('v1/get-set/{poll}', [PollController::class, 'getSetAll']);

Route::post('v1/set-answer', [PollController::class, 'setAnswer']);


Route::get('v1/get-user-answer/{id}', [PollController::class, 'getResultUserWise']);


Route::get('v1/get-final-result/{poll}/{unique}', [PollController::class, 'getFinalResult']);

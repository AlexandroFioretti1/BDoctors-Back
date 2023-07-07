<?php

use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\SpecializationController;
use App\Http\Controllers\API\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Api call Profiles route
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profile/{slug}', [ProfileController::class, 'show']);

// Api call Specializations route
Route::get('/specializations', [SpecializationController::class, 'index']);

//Api call Vote
Route::post('/votes', [VoteController::class, 'store']);
Route::post('/reviews', [ReviewController::class, 'store']);

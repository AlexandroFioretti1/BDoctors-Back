<?php

use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\MessageController;
use App\Http\Controllers\Doctor\ProfileController as DoctorProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Doctor\ReviewController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//route DoctorProfile
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name(('dashboard'));
    Route::resource('/profiles', DoctorProfileController::class)->parameters([
        'profiles' => 'profile:slug'
    ]);
    /* 34\35\36 code from 42 */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/messages', MessageController::class);

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

});

//route Profile auth
/* Route::middleware('auth')->group(function () {
 
}); */

require __DIR__ . '/auth.php';
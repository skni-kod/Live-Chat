<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Websockets;

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
    return view('auth\login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'showProfile'])->name('profile');
Route::post('/avatar/upload', [App\Http\Controllers\Auth\ProfileController::class, 'uploadAvatar'])->name('avatar.upload');
Route::put('/profile/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'updateProfile'])->name('profile.update');


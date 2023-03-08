<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/settings', [App\Http\Controllers\ChatSettingsController::class, 'showSettings'])->name('settings');
Route::resource('settings', App\Http\Controllers\ChatSettingsController::class );
Route::post('/chat-settings', [App\Http\Controllers\ChatSettingsController::class, 'store'])->name('chat-settings.store');
Route::post('/save-livechat-option', [App\Http\Controllers\ChatSettingsController::class, 'savePosition'])->name('save-livechat-option');

Route::get('/chatonly',  [App\Http\Controllers\ChatSettingsController::class, 'showChat'])->name('chatonly');




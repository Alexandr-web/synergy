<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Auth
Route::prefix('auth')->group(function() {
  Route::view('/registration', 'auth.registration')
    ->middleware('redirectUserIfAuthenticated');
  Route::view('/login', 'auth.login')
    ->middleware('redirectUserIfAuthenticated');
  
  Route::post('/registration', [AuthController::class, 'registraiton']);
  Route::post('/login', [AuthController::class, 'login']);
});

// Profile
Route::get('/profile/{id}', [UserController::class, 'profileRender'])
  ->where('id', '[0-9]+')
  ->middleware(['redirectUserIfNotAuthenticated', 'tab']);

// Home
Route::view('/', 'index')
  ->middleware('redirectUserIfNotAuthenticated');
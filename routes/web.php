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
});

// Profile
Route::get('profile/{id}', [UserController::class, 'profileRender'])
  ->where('id', '[0-9]+')
  ->middleware(['redirectUserIfNotAuthenticated', 'tab']);

// Home
Route::view('/', 'index')
  ->middleware('redirectUserIfNotAuthenticated');

// Logout
Route::view('/logout', 'logout')
  ->middleware('redirectUserIfNotAuthenticated');

// Api
Route::prefix('api')->group(function () {
  Route::get('/profile/{id}', [UserController::class, 'getOne'])
    ->where('id', '[0-9]+');
  Route::put('/profile/{id}/edit', [UserController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->middleware('checkAuthToken');
  Route::delete('/profile/{id}/delete', [UserController::class, 'deleteOne'])
    ->where('id', '[0-9]+')
    ->middleware('checkAuthToken');

  Route::post('/auth/registration', [AuthController::class, 'registraiton']);
  Route::post('/auth/login', [AuthController::class, 'login']);
});
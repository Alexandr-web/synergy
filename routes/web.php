<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/auth/registration', 'auth.registration');
Route::view('/auth/login', 'auth.login');

Route::post('/auth/registration', [AuthController::class, 'registraiton']);
Route::post('/auth/login', [AuthController::class, 'login']);
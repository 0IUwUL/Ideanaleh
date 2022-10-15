<?php

use Illuminate\Support\Facades\Route;

// Import controller
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\GoogleAuthController; 
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

Route::get('/', function () {
    return view('welcome');
});

// User registration routes
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

// Google Routes
Route::prefix('google')->name('google.')->group(function(){
    Route::post('callback', [GoogleAuthController::class, 'googleCallback'])->name('callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

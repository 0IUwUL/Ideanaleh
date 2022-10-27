<?php

use Illuminate\Support\Facades\Route;

// Import controller
use App\Http\Controllers\Auth\RegistrationController; 
use App\Http\Controllers\Auth\GoogleAuthController; 
use App\Http\Controllers\Auth\LoginController;
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
    return view('settings');
});

// User registration routes
Route::post('/register-user', [RegistrationController::class, 'registerUser'])->name('register-user');

// Google Routes
Route::prefix('google')->name('google.')->group(function(){
    Route::post('callback', [GoogleAuthController::class, 'googleCallback'])->name('callback');
});

Route::prefix('google')->name('google.')->group(function(){
    Route::post('google-login-user', [GoogleAuthController::class, 'googleLoginUser'])->name('google-login-user');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * pag tinype ni user ang base_url/login ireredirect lang rin sa homepage
 * kasi wala tayong dedicated na login page modal lang ang meron.
 */
Route::get('/login', function() {
    return redirect('/');
})->name('login');

Route::post('/login-user', [LoginController::class, 'loginUser'])->name('login-user');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
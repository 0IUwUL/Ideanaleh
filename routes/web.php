<?php

use Illuminate\Support\Facades\Route;

// Import controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegistrationController; 
use App\Http\Controllers\Auth\GoogleAuthController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProjectController;
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


// Home routes
Route::get('/', [HomeController::class, 'index']);

// Settings routes
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::post('/change-name', [SettingsController::class, 'changeName'])->name('change-name');

Route::post('/change-pass', [SettingsController::class, 'changePass'])->name('change-pass');

Route::post('/upload-img', [SettingsController::class, 'uploadImage'])->name('upload-img');

Route::post('/check-pass', [SettingsController::class, 'checkPassword'])->name('check-pass');

Route::post('/change-email', [SettingsController::class, 'changeEmail'])->name('check-email');

Route::post('/change-address', [SettingsController::class, 'changeAddress'])->name('check-address');


// Admin routes
Route::get('/admin', function () {
    return view('pages.adminPage');
});


// User registration routes
Route::post('/register-user', [RegistrationController::class, 'registerUser'])->name('register-user');

//Project routes
Route::get('/Project-View', [ProjectController::class, 'index'])->name('Project-View');

Route::post('/save-created-project', [ProjectController::class, 'saveCreatedProject'])->name('save-created-project');

Route::get('/project', function () {
    return view('pages.create');
})->name('project');

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

// Send Email Routes
Route::get('/send-email', [EmailController::class, 'sendCode'])->name('send-email');

// Verify Code Routes
Route::post('/verify', [EmailController::class, 'verify'])->name('verify');
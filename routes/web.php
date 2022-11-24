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
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\ProgressController;
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
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/home', 'index')->name('home');
});

// Settings routes
Route::middleware('auth')->controller(SettingsController::class)->group(function () {
    Route::get('/settings', 'index')->name('settings');
    Route::post('/change-name', 'changeName')->name('change-name');
    Route::post('/change-pass', 'changePass')->name('change-pass');
    Route::post('/upload-img', 'uploadImage')->name('upload-img');
    Route::post('/check-pass', 'checkPassword')->name('check-pass');
    Route::post('/change-email', 'changeEmail')->name('check-email');
    Route::post('/change-address', 'changeAddress')->name('check-address');
});

// Admin routes
Route::get('/admin', function () {
    return view('pages.adminPage');
});

// User registration routes
Route::controller(RegistrationController::class)->group(function () {
    Route::post('/register-user', 'registerUser')->name('register-user');
    Route::post('/verify-email', 'dupliEmail')->name('login-user');
});

// Project routes
Route::controller(ProjectController::class)->prefix('project')->name('project.')->group(function () {
    // Project controller routes
    Route::controller(ProjectController::class)->group(function () {
        Route::middleware('auth')->get('/create', 'index')->name('create');
        Route::get('/view/{id}', 'view')->name('view');
        Route::middleware('auth')->post('/save', 'saveCreatedProject')->name('save');
    });
    
});

// User Preferences routes
Route::prefix('user-preference')->name('user-preference.')->group(function(){
    Route::controller(UserPreferenceController::class)->group(function(){
        Route::post('/update/add', 'addFollowed')->name('update/add');
        Route::post('/update/delete', 'deleteFollowed')->name('update/delete');
    });
});

// Project progress routes
Route::controller(ProgressController::class)->prefix('progress')->name('progress.')->group(function () {
    Route::middleware('auth')->post('/create', 'create')->name('create');
});

// Google Routes
Route::controller(GoogleAuthController::class)->prefix('google')->name('google.')->group(function(){
    Route::post('login-user', 'googleLoginUser')->name('login-user');
});

// Not utilized
// Auth::routes();

/**
 * pag tinype ni user ang base_url/login ireredirect lang rin sa homepage
 * kasi wala tayong dedicated na login page modal lang ang meron.
 */
Route::get('/login', function() {
    return redirect('/');
})->name('login');

// Login Routes
Route::controller(LoginController::class)->group(function () {
    Route::post('/verify-log', 'verifyInput')->name('verify-log');
    Route::post('/login-user', 'loginUser')->name('login-user');
    Route::get('/logout', 'logout')->name('logout');
});

// Email routes
Route::controller(EmailController::class)->group(function () {
    Route::post('/send-email', 'sendCode')->name('send-email');
    Route::post('/verify', 'verify')->name('verify');
});
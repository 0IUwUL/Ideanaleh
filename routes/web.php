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
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\FilterProjects;
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
Route::middleware('auth', 'selected')->controller(SettingsController::class)->group(function () {
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
})->name('admin');

// User registration routes
Route::controller(RegistrationController::class)->group(function () {
    Route::post('/register-user', 'registerUser')->name('register-user');
    Route::post('google/register-user', 'GoogleRegisterUser')->name('google-register-user');
    Route::post('/verify-email', 'dupliEmail')->name('login-user');
});


// User Preferences routes
Route::controller(UserPreferenceController::class)->prefix('user-preference')->name('user-preference.')->group(function(){
    Route::middleware('auth')->post('follow/', 'updateFollowed')->name('follow/');
});

// Project routes
Route::prefix('project')->name('project.')->group(function () {
    Route::controller(ProjectController::class)->group(function(){
        Route::middleware('auth', 'selected')->get('/create', 'index')->name('create');
        Route::get('/view/{id}', 'view')->name('view');
        Route::middleware('auth', 'selected')->get('edit/{id}', 'edit')->name('edit');
        Route::middleware('auth', 'selected')->post('/save', 'saveCreatedProject')->name('save');
        Route::post('/categs', '_getProjects')->name('categs');
    });

    // Project comments routes
    Route::resource('comment', ProjectCommentController::class, 
                    ['only' => ['index', 'store', 'update', 'destroy']]);
});

// Project updates routes
Route::resource('update', UpdateController::class, 
                ['only' => ['index', 'store', 'update', 'destroy']]);

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

//WEbhook
Route::controller(PaymentsController::class)->group(function(){
    Route::post('/webhook/paymongo', 'webhookPaymongo')->name('webhook/paymongo');
    Route::post('/payment/valid', 'ValidInput')->name('payment/valid');
    Route::post('/payment/create/source', 'createSource')->name('payment/create/source');
    Route::get('/payment/status/{id}/{status}', 'PaymentStatus')->name('payment/success');
});

//Filter Projects
Route::controller(FilterProjects::class)->prefix('main')->group(function(){
    Route::get('/', 'index')->name('main');
    Route::post('/filter', 'Filter')->name('filter');
});
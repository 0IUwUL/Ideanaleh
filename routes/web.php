<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController; // Import controller
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
    return view('welcome');
});

Route::post('/saveItem', [RegistrationController::class, 'saveItem'])->name('saveItem');

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
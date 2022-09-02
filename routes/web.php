<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ResetPasswordController;
use Illuminate\Support\Facades\Route;

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
})->name('homepage');


Route::name('user.')->group(function() {
    Route::get('signup', [AuthController::class, 'index'])->name('signup');
    Route::post('signup/create', [AuthController::class, 'createUser'])->name('signup.create'); 
    
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login/create', [AuthController::class, 'authenticate'])->name('login.create');
    
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('forgot-password', [ResetPasswordController::class, 'index'])->name('forgot');
    Route::post('forgot-password/create', [ResetPasswordController::class, 'forgot'])->name('forgot.create'); 
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset.create');
});

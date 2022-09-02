<?php

use App\Http\Controllers\User\AuthController;
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

    Route::get('dashboard', [AuthController::class, 'dashboard']); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

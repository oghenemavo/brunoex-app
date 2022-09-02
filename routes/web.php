<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\TransactionController;
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
    Route::controller(AuthController::class)->group(function () {
        Route::get('signup', 'index')->name('signup');
        Route::post('signup/create', 'createUser')->name('signup.create');
        Route::get('login', 'login')->name('login');
        Route::post('login/create', 'authenticate')->name('login.create');
        Route::get('logout', 'logout')->name('logout');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('forgot-password', 'index')->name('forgot');
        Route::post('forgot-password/create', 'forgot')->name('forgot.create');
        Route::get('reset-password/{token}', 'showReset')->name('password.reset');
        Route::post('reset-password', 'reset')->name('reset.create');
    });

    // Route::get('dashboard', [TransactionController::class, 'index'])->name('dashboard');

    Route::get('deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::post('deposit/create', [TransactionController::class, 'makeDeposit'])->name('make.deposit');
    Route::get('withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::post('withdraw/create', [TransactionController::class, 'makeWithdrawal'])->name('make.withdraw');

});

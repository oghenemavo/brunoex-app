<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ResetPasswordController as AdminResetPasswordController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\InvestmentController;
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
    Route::middleware('guest:web')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('signup', 'index')->name('signup');
            Route::post('signup/create', 'createUser')->name('signup.create');
            Route::get('login', 'login')->name('login');
            Route::post('login/create', 'authenticate')->name('login.create');
        });

        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('forgot-password', 'index')->name('forgot');
            Route::post('forgot-password/create', 'forgot')->name('forgot.create');
            Route::get('reset-password/{token}', 'showReset')->name('password.reset');
            Route::post('reset-password', 'reset')->name('reset.create');
        });
    });

    Route::middleware('auth:web')->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        
        Route::get('dashboard', function() {
            echo 'user dashboard';
        })->name('dashboard');
        Route::get('deposit', [TransactionController::class, 'deposit'])->name('deposit');
        Route::post('deposit/create', [TransactionController::class, 'makeDeposit'])->name('make.deposit');
        Route::get('withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
        Route::post('withdraw/create', [TransactionController::class, 'makeWithdrawal'])->name('make.withdraw');
    
        Route::get('transfer', [TransactionController::class, 'transfer'])->name('transfer');
        Route::post('transfer/create', [TransactionController::class, 'makeTransfer'])->name('make.transfer');
        
        Route::get('invest', [InvestmentController::class, 'invest'])->name('invest');
        Route::post('invest/create', [InvestmentController::class, 'makeInvestment'])->name('make.investment');
    });
    
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware('guest:admin')->group(function () {
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('login', 'index')->name('login');
            Route::post('login/create', 'authenticate')->name('login.create');
        });
        
        Route::controller(AdminResetPasswordController::class)->group(function () {
            Route::get('forgot-password', 'index')->name('forgot');
            Route::post('forgot-password/create', 'forgot')->name('forgot.create');
            Route::get('reset-password/{token}', 'showReset')->name('password.reset');
            Route::post('reset-password', 'reset')->name('reset.create');
        });
    });
    
    Route::middleware('auth:admin')->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', function() {
            echo 'admin dashboard';
        })->name('dashboard');

        Route::get('bonus', [AdminTransactionController::class, 'bonus'])->name('bonus');
        Route::post('bonus/create', [AdminTransactionController::class, 'addBonus'])->name('add.bonus');

        Route::get('penalty', [AdminTransactionController::class, 'penalty'])->name('penalty');
        Route::post('penalty/create', [AdminTransactionController::class, 'addPenalty'])->name('add.penalty');

        Route::get('deposits', [AdminTransactionController::class, 'deposit'])->name('deposit');
        Route::put('deposit/{deposit}/edit', [AdminTransactionController::class, 'validateDeposit'])->name('validate.deposit');

        Route::get('withdraws', [AdminTransactionController::class, 'withdraw'])->name('withdraw');
        Route::put('withdraw/{withdraw}/edit', [AdminTransactionController::class, 'validateWithdrawal'])->name('validate.withdraw');

        Route::resource('plans', PlanController::class);

    });

});
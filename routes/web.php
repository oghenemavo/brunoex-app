<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ResetPasswordController as AdminResetPasswordController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\DashboardController;
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

Route::middleware('prevent_cached_history')->group(function() {
    Route::get('/', function () {
        return view('home');
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
            
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
            Route::get('profile/security', [DashboardController::class, 'security'])->name('security');
            Route::put('change-password', [DashboardController::class, 'password'])->name('change.password');
            Route::put('change-email', [DashboardController::class, 'email'])->name('change.email');
            Route::put('kyc-profile', [DashboardController::class, 'kycProfile'])->name('kyc.profile');
            Route::put('kyc-address', [DashboardController::class, 'kycAddress'])->name('kyc.address');
    
            Route::get('deposit', [TransactionController::class, 'deposit'])->name('deposit');
            Route::post('deposit/create', [TransactionController::class, 'makeDeposit'])->name('make.deposit');
            Route::get('withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
            Route::post('withdraw/create', [TransactionController::class, 'makeWithdrawal'])->name('make.withdraw');
        
            Route::get('transfer', [TransactionController::class, 'transfer'])->name('transfer');
            Route::post('transfer/create', [TransactionController::class, 'makeTransfer'])->name('make.transfer');
            
            Route::get('plans', [InvestmentController::class, 'plans'])->name('plans');
            Route::get('invest', [InvestmentController::class, 'index'])->name('invest');
            Route::post('invest/create', [InvestmentController::class, 'invest'])->name('make.investment');
            Route::get('wallet', [DashboardController::class, 'wallet'])->name('wallet');
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
            Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::get('profile', [AdminDashboardController::class, 'profile'])->name('profile');
            Route::put('kyc-profile', [AdminDashboardController::class, 'kycProfile'])->name('kyc.profile');
            Route::get('profile/settings', [AdminDashboardController::class, 'settings'])->name('profile.settings');
    
            Route::put('change-password', [AdminDashboardController::class, 'password'])->name('change.password');
            Route::put('change-email', [AdminDashboardController::class, 'email'])->name('change.email');
            
    
            Route::get('bonus', [AdminTransactionController::class, 'bonus'])->name('bonus');
            Route::post('bonus/create', [AdminTransactionController::class, 'addBonus'])->name('add.bonus');
            
            Route::get('penalty', [AdminTransactionController::class, 'penalty'])->name('penalty');
            Route::post('penalty/create', [AdminTransactionController::class, 'addPenalty'])->name('add.penalty');
            
            Route::get('transactions', [AdminTransactionController::class, 'index'])->name('transactions');
            Route::get('transactions-request', [AdminTransactionController::class, 'transactionsRequest'])->name('transactions.request');
            Route::get('transactions-treated', [AdminTransactionController::class, 'transactionsTreatedRequest'])->name('transactions.treated.request');
            Route::get('investment', [AdminTransactionController::class, 'investment'])->name('investment');
            

            Route::put('deposit/{deposit}/edit', [AdminTransactionController::class, 'validateDeposit'])->name('validate.deposit');
            Route::put('withdraw/{withdraw}/edit', [AdminTransactionController::class, 'validateWithdrawal'])->name('validate.withdraw');
            
            Route::resource('plans', PlanController::class);
            

        });
        Route::prefix('data')->name('data.')->group(function() {
            Route::get('transactions', [DataController::class, 'allTransactions'])->name('transactions');
            Route::get('transactions-request', [DataController::class, 'allTransactionsRequest'])->name('transactions.request');
            Route::get('transactions-treated', [DataController::class, 'allTransactionsTreatedRequest'])->name('transactions.treated.request');
            Route::get('investment', [DataController::class, 'allInvestment'])->name('investment');
        });
    
    });
});
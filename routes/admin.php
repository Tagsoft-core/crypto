<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {

    Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/withdraw/{id}/{user?}', [App\Http\Controllers\Admin\WalletController::class, 'withdraw'])->name('admin.withdraw');
    Route::post('/make-withdraw', [App\Http\Controllers\Admin\WalletController::class, 'makeWithdraw'])->name('admin.make-withdraw');

    Route::get('/deposit/{id}/{user?}', [App\Http\Controllers\Admin\WalletController::class, 'deposit'])->name('admin.deposit');
    Route::post('/make-deposit', [App\Http\Controllers\Admin\WalletController::class, 'makeDeposit'])->name('admin.make-deposit');

    Route::get('/transfer/{id}', [App\Http\Controllers\Admin\WalletController::class, 'transfer'])->name('admin.transfer');
    Route::post('/make-transfer', [App\Http\Controllers\Admin\WalletController::class, 'makeTransfer'])->name('admin.make-transfer');

    Route::get('/currencies', [App\Http\Controllers\Admin\CurrencyController::class, 'index'])->name('currencies');
    Route::get('/currency/show/{id}', [App\Http\Controllers\Admin\CurrencyController::class, 'show'])->name('currency.show');
    Route::post('/currency/edit/{id}', [App\Http\Controllers\Admin\CurrencyController::class, 'edit'])->name('currency.edit');

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::get('/user/show/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::post('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.edit');
    Route::get('/user/wallets/{id}', [App\Http\Controllers\Admin\UserController::class, 'wallets'])->name('user.wallets');
});





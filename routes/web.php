<?php

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
    return view('index');
});

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'contactMail'])->name('contact-email');

Auth::routes();

Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

Route::get('/home', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');

Route::name('profile.')->prefix('profile')->group(function () {
    Route::get('/',[\App\Http\Controllers\ProfileController::class,'index'])->name('index');
    Route::post('/{user}',[\App\Http\Controllers\ProfileController::class,'update'])->name('update');
    Route::get('de-activate/{user}',[\App\Http\Controllers\ProfileController::class,'destroy'])->name('destroy');
});

Route::name('notification.')->prefix('notifications')->group(function () {
    Route::get('/', [\App\Http\Controllers\NotificationController::class, 'index'])->name('index');
    Route::get('mark-as-read/{id}', [\App\Http\Controllers\NotificationController::class, 'markNotification'])->name('mark');
    Route::get('/mark-as-read', [App\Http\Controllers\NotificationController::class,'markAsRead'])->name('mark-read');
});

Route::get('/request-transaction-logs/{id}', [App\Http\Controllers\User\WalletController::class, 'requestTransactionLogs'])->name('request.transaction.logs');

Route::get('/withdraw/{id}', [App\Http\Controllers\User\WalletController::class, 'withdraw'])->name('withdraw');
Route::post('/make-withdraw', [App\Http\Controllers\User\WalletController::class, 'makeWithdraw'])->name('make-withdraw');

Route::get('/deposit/{id}', [App\Http\Controllers\User\WalletController::class, 'deposit'])->name('deposit');
Route::post('/make-deposit/{id}', [App\Http\Controllers\User\WalletController::class, 'makeDeposit'])->name('make-deposit');

Route::get('/transfer/{id}', [App\Http\Controllers\User\WalletController::class, 'transfer'])->name('transfer');
Route::post('/make-transfer/{id}', [App\Http\Controllers\User\WalletController::class, 'makeTransfer'])->name('make-transfer');

Route::get('/exchange/{id}', [App\Http\Controllers\User\WalletController::class, 'exchange'])->name('exchange');
Route::post('/make-exchange/{id}', [App\Http\Controllers\User\WalletController::class, 'makeExchange'])->name('make-exchange');

//exchanger routes
Route::post('/convert', [App\Http\Controllers\ExchangerController::class, 'index'])->name('get-conversion');

require_once "admin.php";

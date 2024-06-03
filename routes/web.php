<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JournalController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboards.index');
Route::group(['middleware' => ['auth']], function () {
    // Accounts
    Route::get('/dashboard/accounts', [AccountController::class, 'index'])->name('dashboards.accounts.index');
    Route::get('/dashboard/accounts/create', [AccountController::class, 'create'])->name('dashboards.accounts.create');
    Route::post('/dashboard/accounts/create', [AccountController::class, 'store'])->name('dashboards.accounts.store');
    Route::get('/dashboard/accounts/{account}', [AccountController::class, 'show'])->name('dashboards.accounts.show');
    Route::get('/dashboard/accounts/{account}/edit', [AccountController::class, 'edit'])->name('dashboards.accounts.edit');
    Route::put('/dashboard/accounts/{account}', [AccountController::class, 'update'])->name('dashboards.accounts.update');
    Route::delete('/dashboard/accounts/{account}', [AccountController::class, 'destroy'])->name('dashboards.accounts.destroy');

    // Transactions
    Route::get('/dashboard/transactions', [TransactionController::class, 'index'])->name('dashboards.transactions.index');
    Route::get('/dashboard/transactions/create', [TransactionController::class, 'create'])->name('dashboards.transactions.create');
    Route::post('/dashboard/transactions/create', [TransactionController::class, 'store'])->name('dashboards.transactions.store');
    Route::get('/dashboard/transactions/{account}', [TransactionController::class, 'show'])->name('dashboards.transactions.show');
    Route::get('/dashboard/transactions/{account}/edit', [TransactionController::class, 'edit'])->name('dashboards.transactions.edit');
    Route::put('/dashboard/transactions/{account}', [TransactionController::class, 'update'])->name('dashboards.transactions.update');
    Route::delete('/dashboard/transactions/{account}', [TransactionController::class, 'destroy'])->name('dashboards.transactions.destroy');

    // Journals
    Route::get('/dashboard/journals', [JournalController::class, 'index'])->name('dashboards.journals.index');
    Route::get('/dashboard/journals/create', [JournalController::class, 'create'])->name('dashboards.journals.create');
    Route::post('/dashboard/journals/create', [JournalController::class, 'store'])->name('dashboards.journals.store');
    Route::get('/dashboard/journals/{account}', [JournalController::class, 'show'])->name('dashboards.journals.show');
    Route::get('/dashboard/journals/{account}/edit', [JournalController::class, 'edit'])->name('dashboards.journals.edit');
    Route::put('/dashboard/journals/{account}', [JournalController::class, 'update'])->name('dashboards.journals.update');
    Route::delete('/dashboard/journals/{account}', [JournalController::class, 'destroy'])->name('dashboards.journals.destroy');
});

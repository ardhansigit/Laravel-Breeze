<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\InfoProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile bawaan Laravel Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Wallet + InfoProfile custom
Route::middleware('auth')->group(function () {
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/wallet/process', [WalletController::class, 'process'])->name('wallet.process');

    Route::get('/infoprofile', [InfoProfileController::class, 'edit'])->name('infoprofile');
    Route::patch('/infoprofile', [InfoProfileController::class, 'update'])->name('infoprofile.update');
});

// Cek testing route
Route::get('/cek1', function () {
    return '<h1>Cek1</h1>';
})->middleware(['auth', 'verified']);

Route::get('/cek2', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';

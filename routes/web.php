<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonthlyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/billing', [BillController::class, 'index'])->middleware(['auth', 'verified'])->name('billing');
Route::post('/billing', [BillController::class, 'store'])->middleware(['auth', 'verified'])->name('store-billing');
Route::put('/billing/{id}', [BillController::class, 'update'])->middleware(['auth', 'verified'])->name('update-billing');

Route::resource('/balance', BalanceController::class)->middleware(['auth', 'verified']);
Route::put('/add-balance/{id}', [BalanceController::class, 'addBalance'])->middleware(['auth', 'verified'])->name('addBalance');

Route::put('/pocket-money/{id}', [MonthlyController::class, 'updatePocket'])->middleware(['auth', 'verified'])->name('update-pocket');

Route::resource('/monthly', MonthlyController::class)->middleware(['auth', 'verified']);
Route::post('/edit-monthly', [MonthlyController::class, 'editMonthly'])->middleware(['auth', 'verified'])->name('edit-monthly');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

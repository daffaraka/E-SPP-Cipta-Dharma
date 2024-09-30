<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\DashboardController;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return to_route('dashboard');
    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('siswa',SiswaController::class);
    Route::resource('tagihan',TagihanController::class);
    Route::resource('biaya',BiayaController::class);


});

Route::view('print','admin.tagihan.tagihan-print');

require __DIR__.'/auth.php';



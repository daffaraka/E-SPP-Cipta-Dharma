<?php

use App\Http\Controllers\BiayaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return to_route('dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('siswa',SiswaController::class);
Route::resource('tagihan',TagihanController::class);
Route::resource('biaya',BiayaController::class);

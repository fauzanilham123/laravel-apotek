<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CashierController;

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




Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [LogActivityController::class, 'index'])->middleware('admin');
Route::get('/laporan',[TransactionController::class, 'index'])->middleware('admin');
Route::get('/laporan/pdf',[TransactionController::class, 'view_pdf'])->middleware('admin');
Route::get('/laporan/download-pdf',[TransactionController::class, 'download_pdf'])->middleware('admin');
Route::resource('/obat',DrugsController::class)->middleware('admin');
Route::resource('/user',UserController::class)->middleware('admin');

Route::resource('/resep',RecipeController::class)->middleware('apoteker');
Route::resource('/kasir',CashierController::class)->middleware('kasir');
Route::get('/get-recipe/{id}', [RecipeController::class, 'getRecipeById']);
Route::get('cetak-struk/{transaksiId}', [CashierController::class, 'cetakStruk'])->name('cetak-struk');
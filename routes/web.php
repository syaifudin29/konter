<?php

use App\Http\Controllers\AlatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');

Route::get('/alat', [AlatController::class, 'alat'])->name('alat');
// kategori
Route::get('/alat/kategori-delete/{id}', [AlatController::class, 'deleteKategori'])->name('kategori_delete');
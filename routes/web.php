<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// produk
Route::get('/produk/{id}', [ProdukController::class, 'produk'])->name('produk');
Route::get('/produk/kategori/{id}', [ProdukController::class, 'kategori'])->name('produk_kategori');
Route::post('/produk/produk-simpan/', [ProdukController::class, 'simpanProduk'])->name('produk_simpan');
Route::get('/produk/produk-delete/{id}', [ProdukController::class, 'deleteProduk'])->name('produk_delete');
Route::post('/produk/produk-update/', [ProdukController::class, 'updateProduk'])->name('produk_update');

Route::get('/alat', [AlatController::class, 'alat'])->name('alat');

// kategori
Route::get('/alat/kategori-delete/{id}', [AlatController::class, 'deleteKategori'])->name('kategori_delete');
Route::post('/alat/kategori-simpan/', [AlatController::class, 'simpanKategori'])->name('kategori_simpan');
Route::post('/alat/kategori-update/', [AlatController::class, 'updateKategori'])->name('kategori_update');

// kategori
Route::get('/alat/jenis-delete/{id}', [AlatController::class, 'deletejenis'])->name('jenis_delete');
Route::post('/alat/jenis-simpan/', [AlatController::class, 'simpanJenis'])->name('jenis_simpan');
Route::post('/alat/jenis-update/', [AlatController::class, 'updateJenis'])->name('jenis_update');


// kategori
Route::get('/alat/label-delete/{id}', [AlatController::class, 'deleteLabel'])->name('label_delete');
Route::post('/alat/label-simpan/', [AlatController::class, 'simpanLabel'])->name('label_simpan');
Route::post('/alat/label-update/', [AlatController::class, 'updateLabel'])->name('label_update');

// saldo
Route::get('/saldo', [SaldoController::class, 'saldo'])->name('saldo');
Route::post('/saldo/saldo-update/', [SaldoController::class, 'updateSaldo'])->name('saldo_update');
Route::get('/saldo/saldo-delete/{id}', [SaldoController::class, 'deleteSaldo'])->name('saldo_delete');
Route::post('/saldo/saldo-simpan/', [SaldoController::class, 'simpanSaldo'])->name('saldo_simpan');

// transaksi
Route::get('/transaksi', [TransaksiController::class, 'transaksi'])->name('transaksi');
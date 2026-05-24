<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


// route halaman dashboard
Route::get('/', [DashboardController::class, 'index']);

// route halaman history transaksi
Route::get('/history/transaksi', [TransaksiController::class, 'index'])->name('history.transaksi');

// route halaman history pemasukan
Route::get('/history/pemasukan', [PemasukanController::class, 'index'])->name('history.pemasukan');

// route halaman history pengeluaran
Route::get('/history/pengeluaran', [PengeluaranController::class, 'index'])->name('history.pengeluaran');

// route halaman form pemasukan
Route::get('/pemasukan',[PemasukanController::class,'create'])->name('pemasukan');
Route::post('/pemasukan/store',[PemasukanController::class,'store'])->name('pemasukan.store');

// route halaman form pengeluaran
Route::get('/pengeluaran',[PengeluaranController::class,'create'])->name('pengeluaran');
Route::post('/pengeluaran/store',[PengeluaranController::class,'store'])->name('pengeluaran.store');

// route halaman laporan
Route::get('/laporan',[LaporanController::class,'index']);

// route halaman produk
Route::get('/produk',[ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create',[ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store',[ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

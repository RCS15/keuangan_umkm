<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
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
Route::get('/pemasukan',[PemasukanController::class,'create']);
Route::post('/pemasukan/store',[PemasukanController::class,'store']);

// route halaman form pengeluaran
Route::get('/pengeluaran',[PengeluaranController::class,'create']);

// route halaman laporan
Route::get('/laporan',[LaporanController::class,'index']);

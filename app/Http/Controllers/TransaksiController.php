<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class TransaksiController extends Controller
{
    public function index()
    {
        //Ambil semua pemasukan
        $pemasukan = Pemasukan::get()->map(function($item){
            return (object) [
                'tanggal' => $item->tanggal,
                'jenis' => 'Pemasukan',
                'deskripsi' => $item ->produk . '('. $item->jumlah . ' bungkus)' ,
                'masuk' => $item->total,
                'keluar' => 0,
                'sumber' => 'pemasukan',
                'id' => $item->id,
            ];
        });
    
        //Ambil semua pengeluaran
        $pengeluaran = Pengeluaran::get()->map(function($item) {
            return (object) [
                'tanggal' => $item->tanggal,
                'jenis' => 'Pengeluaran',
                'deskripsi' => $item->bahan . ' (' . $item->jumlah . ' unit)',
                'masuk' => 0,
                'keluar' => $item->harga_total,
                'sumber' => 'pengeluaran',
                'id' => $item->id,
            ];
        });

        // Gabungkan dan urutkan berdasarkan tanggal
        $semuaTransaksi = $pemasukan->concat($pengeluaran);
        $semuaTransaksi = $semuaTransaksi->sortByDesc('tanggal')->values();

        return view('history.transaksi', compact('semuaTransaksi'));
    
    }
}

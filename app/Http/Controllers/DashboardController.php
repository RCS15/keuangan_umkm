<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class DashboardController extends Controller
{
    public function index()
    {
        // menghitung total pemasukan
        $totalPemasukan = Pemasukan::sum('total');

        // menghitung total pengeluaran
        $totalPengeluaran = Pengeluaran::sum('harga_total');

        // menghitung total saldo
        $saldoKas = $totalPemasukan - $totalPengeluaran;

        // Ambil semua pemasukan
        $pemasukan = Pemasukan::get()->map(function($item){
            return (object) [
                'tanggal' => $item->tanggal,
                'jenis' => 'Pemasukan',
                'deskripsi' => $item->produk . ' (' . $item->jumlah . ' bungkus)',
                'jumlah' => $item->total,
                'sumber' => 'pemasukan',
                'id' => $item->id,
            ];
        });
    
        // Ambil semua pengeluaran
        $pengeluaran = Pengeluaran::get()->map(function($item) {
            return (object) [
                'tanggal' => $item->tanggal,
                'jenis' => 'Pengeluaran',
                'deskripsi' => $item->bahan . ' (' . $item->jumlah . ' unit)',
                'jumlah' => $item->harga_total,
                'sumber' => 'pengeluaran',
                'id' => $item->id,
            ];
        });

        // Gabungkan dan urutkan berdasarkan tanggal terbaru
        $semuaTransaksi = $pemasukan->concat($pengeluaran);
        $semuaTransaksi = $semuaTransaksi->sortByDesc('tanggal')->values();

        // Ambil 5 transaksi terbaru untuk ditampilkan di tabel dashboard
        $transaksiTerbaru = $semuaTransaksi->take(5);

        // Data untuk Diagram (7 hari terakhir)
        $chartLabels = [];
        $chartPemasukan = [];
        $chartPengeluaran = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = now()->subDays($i)->format('d M');
            
            $chartPemasukan[] = Pemasukan::whereDate('tanggal', $date)->sum('total');
            $chartPengeluaran[] = Pengeluaran::whereDate('tanggal', $date)->sum('harga_total');
        }

        return view('dashboard', compact(
            'totalPemasukan', 
            'totalPengeluaran', 
            'saldoKas', 
            'transaksiTerbaru',
            'chartLabels',
            'chartPemasukan',
            'chartPengeluaran'
        ));
    }
}

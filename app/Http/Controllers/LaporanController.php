<?php

namespace App\Http\Controllers;


class LaporanController extends Controller
{
    public function index(){
    $pemasukan = \App\Models\Pemasukan::orderBy('tanggal', 'desc')->get();
    $pengeluaran = \App\Models\Pengeluaran::orderBy('tanggal', 'desc')->get();

    $totalPemasukan = $pemasukan->sum('total');
    $totalPengeluaran = $pengeluaran->sum('harga_total');
    $labaBersih = $totalPemasukan - $totalPengeluaran;

    // Data chart bulanan (6 bulan terakhir)
    $chartLabels = [];
    $chartPemasukan = [];
    $chartPengeluaran = [];
    $chartLaba = [];

    for ($i = 5; $i >= 0; $i--) {
        $date = now()->subMonths($i);
        $chartLabels[] = $date->translatedFormat('M Y');
        $pemasukanBulan = \App\Models\Pemasukan::whereMonth('tanggal', $date->month)
            ->whereYear('tanggal', $date->year)->sum('total');
        $pengeluaranBulan = \App\Models\Pengeluaran::whereMonth('tanggal', $date->month)
            ->whereYear('tanggal', $date->year)->sum('harga_total');
        $chartPemasukan[] = $pemasukanBulan;
        $chartPengeluaran[] = $pengeluaranBulan;
        $chartLaba[] = $pemasukanBulan - $pengeluaranBulan;
    }

    return view('laporan.index', compact(
        'pemasukan', 'pengeluaran',
        'totalPemasukan', 'totalPengeluaran', 'labaBersih',
        'chartLabels', 'chartPemasukan', 'chartPengeluaran', 'chartLaba'
    ));
    }
}

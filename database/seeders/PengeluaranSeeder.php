<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    public function run(): void
    {
        $bahanList = [
            'Singkong Mentah',
            'Minyak Goreng',
            'Bumbu Pedas & Asin',
            'Gas Elpiji 3kg',
            'Plastik Kemasan',
            'Pisang Mentah',
            'Tepung Bumbu',
            'Label & Stiker',
            'Gula Pasir',
            'Coklat Bubuk',
            'Kardus Packaging',
        ];

        $keteranganList = [
            'Beli dari petani lokal',
            'Stok mingguan',
            'Beli di grosir',
            'Isi ulang gas',
            'Ukuran sedang',
            'Beli dari pengepul',
            'Stok bulanan',
            'Cetak label baru',
            'Beli di pasar',
            'Beli online',
            'Stok kemasan karton',
            'Beli di supplier langganan',
            'Pembelian awal bulan',
            'Restok bahan utama',
            'Beli di toko grosir kota',
            'Persiapan pesanan besar',
            'Stok bahan menjelang lebaran',
        ];

        // Februari 2026: 10 transaksi
        $febData = [
            ['02-01', 0, 50,  250000, 0],
            ['02-03', 1, 10,  160000, 1],
            ['02-05', 2,  5,   75000, 2],
            ['02-07', 3,  2,   44000, 3],
            ['02-09', 4, 500, 100000, 4],
            ['02-13', 5, 30,  180000, 5],
            ['02-16', 6,  3,   45000, 6],
            ['02-19', 0, 60,  300000, 13],
            ['02-23', 1, 10,  160000, 1],
            ['02-27', 3,  3,   66000, 3],
        ];

        // Maret 2026: 12 transaksi
        $marData = [
            ['03-02', 0,  70,  350000, 12],
            ['03-04', 1,  12,  192000, 1],
            ['03-06', 5,  40,  240000, 5],
            ['03-08', 2,   6,   90000, 14],
            ['03-10', 4, 600,  120000, 4],
            ['03-13', 3,   3,   66000, 3],
            ['03-15', 7,   1,   85000, 7],
            ['03-17', 6,   4,   60000, 6],
            ['03-20', 0,  80,  400000, 11],
            ['03-22', 8,   5,   65000, 8],
            ['03-26', 1,  15,  240000, 15],
            ['03-29', 9,   2,   50000, 9],
        ];

        // April 2026: 14 transaksi
        $aprData = [
            ['04-01', 0,  80,  400000, 12],
            ['04-03', 1,  15,  240000, 1],
            ['04-05', 5,  50,  300000, 5],
            ['04-07', 2,   8,  120000, 14],
            ['04-09', 4, 800,  160000, 4],
            ['04-11', 3,   4,   88000, 3],
            ['04-13', 6,   5,   75000, 6],
            ['04-15', 7,   2,  170000, 7],
            ['04-17', 0, 100,  500000, 16],
            ['04-19', 8,   8,  104000, 8],
            ['04-21', 9,   3,   75000, 9],
            ['04-23', 10, 50,  150000, 10],
            ['04-25', 1,  20,  320000, 15],
            ['04-27', 5,  60,  360000, 16],
        ];

        $allData = array_merge($febData, $marData, $aprData);

        foreach ($allData as $row) {
            Pengeluaran::create([
                'bahan'       => $bahanList[$row[1]],
                'jumlah'      => $row[2],
                'harga_total' => $row[3],
                'tanggal'     => '2026-' . $row[0],
                'keterangan'  => $keteranganList[$row[4]],
            ]);
        }
    }
}

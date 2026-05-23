<?php

namespace Database\Seeders;

use App\Models\Pemasukan;
use Illuminate\Database\Seeder;

class PemasukanSeeder extends Seeder
{
    public function run(): void
    {
        $produkList = [
            ['produk' => 'Keripik Singkong Pedas',    'harga' => 15000],
            ['produk' => 'Keripik Pisang Manis',       'harga' => 12000],
            ['produk' => 'Keripik Singkong Original',  'harga' => 13000],
            ['produk' => 'Keripik Tempe Rejeki',       'harga' => 10000],
            ['produk' => 'Keripik Pisang Coklat',      'harga' => 14000],
            ['produk' => 'Keripik Singkong Balado',    'harga' => 15000],
        ];

        $keteranganList = [
            'Penjualan COD area pasar',
            'Pesanan Toko Berkah',
            'Penjualan di toko sendiri',
            'Reseller Bandung',
            'Penjualan online Shopee',
            'Pesanan warung Bu Ani',
            'Penjualan di bazar desa',
            'Pesanan hajatan',
            'Penjualan online Tokopedia',
            'Titipan minimarket lokal',
            'Pesanan catering akhir bulan',
            'Reseller Jakarta',
            'Pesanan event sekolah',
            'Pesanan besar reseller Surabaya',
            'Pesanan hajatan RT 05',
            'Titipan warung Pak Dedi',
            'Penjualan di bazar kecamatan',
            'Pesanan arisan ibu-ibu',
            'Reseller Semarang',
            'Penjualan awal bulan online',
            'Penjualan COD area kota',
            'Pesanan besar reseller Bandung',
            'Pesanan event kampus',
            'Penjualan online Shopee promo',
            'Penjualan di bazar ramadhan',
            'Pesanan parcel lebaran',
            'Pesanan besar menjelang lebaran',
        ];

        // Februari 2026: 12 transaksi
        $febDates = ['02-02','02-04','02-06','02-08','02-10','02-12','02-15','02-17','02-20','02-22','02-25','02-28'];
        $febJumlah = [25, 15, 20, 30, 40, 18, 22, 35, 30, 12, 18, 20];
        $febProduk = [0, 1, 2, 3, 0, 4, 5, 3, 0, 1, 2, 0];
        $febKet    = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 2, 10];

        // Maret 2026: 14 transaksi
        $marDates = ['03-01','03-03','03-05','03-07','03-09','03-11','03-14','03-16','03-18','03-20','03-23','03-25','03-27','03-30'];
        $marJumlah = [35, 20, 40, 28, 25, 30, 45, 50, 18, 20, 30, 15, 22, 25];
        $marProduk = [0, 1, 3, 5, 4, 2, 0, 3, 1, 5, 0, 4, 2, 3];
        $marKet    = [0, 1, 11, 4, 12, 2, 13, 14, 15, 8, 16, 17, 2, 18];

        // April 2026: 14 transaksi
        $aprDates = ['04-01','04-03','04-05','04-07','04-09','04-11','04-13','04-15','04-17','04-19','04-21','04-23','04-25','04-27'];
        $aprJumlah = [40, 22, 30, 45, 28, 50, 25, 16, 35, 60, 55, 30, 20, 35];
        $aprProduk = [0, 1, 5, 3, 4, 0, 2, 1, 5, 3, 0, 4, 2, 0];
        $aprKet    = [19, 1, 20, 21, 22, 23, 2, 9, 24, 25, 26, 25, 2, 8];

        $months = [
            ['dates' => $febDates, 'jumlah' => $febJumlah, 'produk' => $febProduk, 'ket' => $febKet],
            ['dates' => $marDates, 'jumlah' => $marJumlah, 'produk' => $marProduk, 'ket' => $marKet],
            ['dates' => $aprDates, 'jumlah' => $aprJumlah, 'produk' => $aprProduk, 'ket' => $aprKet],
        ];

        foreach ($months as $month) {
            for ($i = 0; $i < count($month['dates']); $i++) {
                $p = $produkList[$month['produk'][$i]];
                $jumlah = $month['jumlah'][$i];
                Pemasukan::create([
                    'produk'           => $p['produk'],
                    'jumlah'           => $jumlah,
                    'harga_per_bungkus'=> $p['harga'],
                    'total'            => $jumlah * $p['harga'],
                    'tanggal'          => '2026-' . $month['dates'][$i],
                    'keterangan'       => $keteranganList[$month['ket'][$i]],
                ]);
            }
        }
    }
}

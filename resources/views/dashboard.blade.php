@extends('layouts.app')

@section('content')

    {{-- Bagian Header & Tombol Action --}}
    @include('dashboard.partials.header')

    {{-- Bagian Card Statistik (Saldo, Pemasukan, Pengeluaran) --}}
    @include('dashboard.partials.stats')

    {{-- Bagian Chart/Grafik Tren Keuangan --}}
    @include('dashboard.partials.chart')

    {{-- Bagian Navigasi Pintasan Riwayat --}}
    @include('dashboard.partials.shortcuts')

    {{-- Bagian Tabel 5 Transaksi Terbaru --}}
    @include('dashboard.partials.recent-transactions')

@endsection

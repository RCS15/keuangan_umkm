@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 animate-fade-in-up">
        <div>
            <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Laporan Keuangan</h2>
            <p class="text-slate-500 mt-1">Ringkasan performa keuangan UMKM berdasarkan periode.</p>
        </div>
        <div class="flex gap-2">
            <a href="/"
                class="px-4 py-2.5 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-indigo-600 transition-colors shadow-sm">
                <i class="fa-solid fa-arrow-left mr-1.5"></i> Dashboard
            </a>
            <button onclick="window.print()"
                class="px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-200 hover:-translate-y-0.5 transform duration-200">
                <i class="fa-solid fa-print mr-1.5"></i> Cetak Laporan
            </button>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-fade-in-up" style="animation-delay:.05s">
        {{-- Pemasukan --}}
        <div
            class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1 group">
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-linear-to-br from-indigo-400 to-indigo-500 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500">
            </div>
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-medium text-slate-500">Total Pemasukan</p>
                <div
                    class="w-10 h-10 bg-indigo-50 text-indigo-500 rounded-xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                    <i class="fa-solid fa-arrow-down"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-indigo-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
            <p class="text-xs text-slate-400 mt-2"><i class="fa-solid fa-receipt mr-1"></i> {{ $pemasukan->count() }}
                transaksi</p>
        </div>

        {{-- Pengeluaran --}}
        <div
            class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1 group">
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-linear-to-br from-rose-400 to-rose-500 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500">
            </div>
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-medium text-slate-500">Total Pengeluaran</p>
                <div
                    class="w-10 h-10 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center group-hover:-rotate-12 transition-transform duration-300">
                    <i class="fa-solid fa-arrow-up"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-rose-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
            <p class="text-xs text-slate-400 mt-2"><i class="fa-solid fa-receipt mr-1"></i> {{ $pengeluaran->count() }}
                transaksi</p>
        </div>

        {{-- Laba / Rugi --}}
        <div
            class="relative overflow-hidden rounded-2xl p-6 shadow-lg transition-all duration-300 transform hover:-translate-y-1
        {{ $labaBersih >= 0 ? 'bg-linear-to-br from-emerald-500 to-teal-600 shadow-emerald-200 hover:shadow-xl hover:shadow-emerald-300' : 'bg-linear-to-br from-rose-500 to-pink-600 shadow-rose-200 hover:shadow-xl hover:shadow-rose-300' }}">
            <div class="absolute right-0 bottom-0 opacity-10">
                <i class="fa-solid fa-chart-line text-8xl -mr-6 -mb-6"></i>
            </div>
            <div class="flex items-center justify-between mb-3 relative z-10">
                <p class="text-sm font-medium text-white/80">{{ $labaBersih >= 0 ? 'Laba Bersih' : 'Rugi Bersih' }}</p>
                <div class="w-10 h-10 bg-white/20 text-white rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-white relative z-10">Rp {{ number_format(abs($labaBersih), 0, ',', '.') }}
            </h3>
            <p class="text-xs text-white/70 mt-2 relative z-10">
                <i class="fa-solid fa-{{ $labaBersih >= 0 ? 'arrow-trend-up' : 'arrow-trend-down' }} mr-1"></i>
                Margin {{ $totalPemasukan > 0 ? number_format(($labaBersih / $totalPemasukan) * 100, 1) : 0 }}%
            </p>
        </div>
    </div>

    {{-- Chart --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-8 animate-fade-in-up"
        style="animation-delay:.1s">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-slate-800"><i class="fa-solid fa-chart-bar mr-2 text-indigo-500"></i> Tren
                Keuangan 6 Bulan Terakhir</h3>
        </div>
        @if ($pemasukan->count() == 0 && $pengeluaran->count() == 0)
            <div
                class="w-full h-64 bg-slate-50 rounded-xl border border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-400">
                <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center mb-4">
                    <i class="fa-solid fa-chart-pie text-2xl text-slate-300"></i>
                </div>
                <p class="font-medium text-slate-500">Belum ada data untuk grafik</p>
                <p class="text-sm mt-1">Grafik akan tampil saat ada transaksi.</p>
            </div>
        @else
            <div style="height:320px"><canvas id="laporanChart"></canvas></div>
        @endif
    </div>

    {{-- Tables --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 animate-fade-in-up" style="animation-delay:.15s">
        {{-- Tabel Pemasukan --}}
        <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
            <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-800"><i class="fa-solid fa-arrow-down mr-2 text-indigo-500"></i>
                    Rincian Pemasukan</h3>
                <span
                    class="text-xs font-semibold px-2.5 py-1 rounded-full bg-indigo-50 text-indigo-600">{{ $pemasukan->count() }}
                    data</span>
            </div>
            <div class="overflow-x-auto max-h-96 overflow-y-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-100 sticky top-0">
                        <tr>
                            <th class="px-5 py-3 font-semibold">Tanggal</th>
                            <th class="px-5 py-3 font-semibold">Produk</th>
                            <th class="px-5 py-3 font-semibold text-center">Qty</th>
                            <th class="px-5 py-3 font-semibold text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($pemasukan as $p)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3 whitespace-nowrap text-slate-700">
                                    {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                                <td class="px-5 py-3 text-slate-800 font-medium">{{ $p->produk }}</td>
                                <td class="px-5 py-3 text-center text-slate-600">{{ $p->jumlah }}</td>
                                <td class="px-5 py-3 text-right font-bold text-emerald-600 whitespace-nowrap">+ Rp
                                    {{ number_format($p->total, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-10 text-center text-slate-400">
                                    <i class="fa-solid fa-inbox text-2xl mb-2 block"></i> Belum ada pemasukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabel Pengeluaran --}}
        <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
            <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                <h3 class="text-base font-bold text-slate-800"><i class="fa-solid fa-arrow-up mr-2 text-rose-500"></i>
                    Rincian Pengeluaran</h3>
                <span
                    class="text-xs font-semibold px-2.5 py-1 rounded-full bg-rose-50 text-rose-600">{{ $pengeluaran->count() }}
                    data</span>
            </div>
            <div class="overflow-x-auto max-h-96 overflow-y-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-100 sticky top-0">
                        <tr>
                            <th class="px-5 py-3 font-semibold">Tanggal</th>
                            <th class="px-5 py-3 font-semibold">Bahan</th>
                            <th class="px-5 py-3 font-semibold text-center">Qty</th>
                            <th class="px-5 py-3 font-semibold text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($pengeluaran as $k)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3 whitespace-nowrap text-slate-700">
                                    {{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                                <td class="px-5 py-3 text-slate-800 font-medium">{{ $k->bahan }}</td>
                                <td class="px-5 py-3 text-center text-slate-600">{{ $k->jumlah }}</td>
                                <td class="px-5 py-3 text-right font-bold text-rose-600 whitespace-nowrap">- Rp
                                    {{ number_format($k->harga_total, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-10 text-center text-slate-400">
                                    <i class="fa-solid fa-inbox text-2xl mb-2 block"></i> Belum ada pengeluaran
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Ringkasan Akhir --}}
    <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-6 mb-4 animate-fade-in-up"
        style="animation-delay:.2s">
        <h3 class="text-lg font-bold text-slate-800 mb-5"><i class="fa-solid fa-calculator mr-2 text-indigo-500"></i>
            Ringkasan Laba Rugi</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between py-3 border-b border-slate-100">
                <span class="text-slate-600 flex items-center"><span
                        class="w-3 h-3 rounded-full bg-indigo-500 mr-3"></span> Total Pemasukan</span>
                <span class="font-bold text-indigo-600">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</span>
            </div>
            <div class="flex items-center justify-between py-3 border-b border-slate-100">
                <span class="text-slate-600 flex items-center"><span class="w-3 h-3 rounded-full bg-rose-500 mr-3"></span>
                    Total Pengeluaran</span>
                <span class="font-bold text-rose-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
            </div>
            <div
                class="flex items-center justify-between py-3 rounded-xl px-4 -mx-4 {{ $labaBersih >= 0 ? 'bg-emerald-50' : 'bg-rose-50' }}">
                <span class="font-bold {{ $labaBersih >= 0 ? 'text-emerald-700' : 'text-rose-700' }} flex items-center">
                    <i class="fa-solid fa-{{ $labaBersih >= 0 ? 'circle-check' : 'circle-xmark' }} mr-2"></i>
                    {{ $labaBersih >= 0 ? 'Laba Bersih' : 'Rugi Bersih' }}
                </span>
                <span class="font-extrabold text-lg {{ $labaBersih >= 0 ? 'text-emerald-700' : 'text-rose-700' }}">Rp
                    {{ number_format(abs($labaBersih), 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

    {{-- Chart.js --}}
    @if ($pemasukan->count() > 0 || $pengeluaran->count() > 0)
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('laporanChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                                label: 'Pemasukan',
                                data: @json($chartPemasukan),
                                backgroundColor: 'rgba(99,102,241,0.7)',
                                borderColor: '#6366f1',
                                borderWidth: 1,
                                borderRadius: 6
                            },
                            {
                                label: 'Pengeluaran',
                                data: @json($chartPengeluaran),
                                backgroundColor: 'rgba(244,63,94,0.7)',
                                borderColor: '#f43f5e',
                                borderWidth: 1,
                                borderRadius: 6
                            },
                            {
                                label: 'Laba/Rugi',
                                data: @json($chartLaba),
                                type: 'line',
                                borderColor: '#10b981',
                                backgroundColor: 'rgba(16,185,129,0.1)',
                                borderWidth: 2,
                                pointRadius: 4,
                                pointBackgroundColor: '#10b981',
                                fill: true,
                                tension: 0.3
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 20,
                                    font: {
                                        family: 'Inter',
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#1e293b',
                                padding: 12,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                },
                                callbacks: {
                                    label: function(c) {
                                        let l = c.dataset.label || '';
                                        if (l) l += ': ';
                                        if (c.parsed.y !== null) l += new Intl.NumberFormat('id-ID', {
                                            style: 'currency',
                                            currency: 'IDR',
                                            maximumFractionDigits: 0
                                        }).format(c.parsed.y);
                                        return l;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    borderDash: [5, 5],
                                    color: '#e2e8f0'
                                },
                                ticks: {
                                    font: {
                                        family: 'Inter'
                                    },
                                    callback: function(v) {
                                        if (v >= 1e6) return 'Rp ' + (v / 1e6) + 'jt';
                                        if (v >= 1e3) return 'Rp ' + (v / 1e3) + 'rb';
                                        return 'Rp ' + v;
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        family: 'Inter'
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endif
@endsection

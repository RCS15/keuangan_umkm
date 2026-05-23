@extends('layouts.app')

@section('content')

<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Dashboard Overview</h2>
        <p class="text-slate-500 mt-1">Selamat datang kembali! Berikut ringkasan keuangan UMKM Anda.</p>
    </div>
    <div class="flex gap-3">
        <a href="/pemasukan" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 overflow-hidden shadow-lg shadow-indigo-200 hover:-translate-y-0.5">
            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
            <i class="fa-solid fa-plus mr-2"></i> Tambah Pemasukan
        </a>
        <a href="/pengeluaran" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 bg-rose-500 border border-transparent rounded-xl hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 overflow-hidden shadow-lg shadow-rose-200 hover:-translate-y-0.5">
            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
            <i class="fa-solid fa-plus mr-2"></i> Tambah Pengeluaran
        </a>
    </div>
</div>

<div class="flex justify-between items-center mb-4 mt-8">
    <h3 class="text-lg font-bold text-slate-800 flex items-center">
        <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-500 flex items-center justify-center mr-3">
            <i class="fa-solid fa-clock-rotate-left"></i>
        </div>
        Laporan Transaksi
    </h3>
    <a href="/laporan" class="text-sm text-indigo-600 font-medium hover:text-indigo-700 transition-colors">Lihat Rincian <i class="fa-solid fa-chevron-right text-xs ml-1"></i></a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Saldo Card -->
    <div class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1 group">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-linear-to-br from-emerald-400 to-emerald-500 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500 ease-in-out"></div>
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Total Saldo Kas</p>
                <h3 class="text-3xl font-bold text-slate-800">Rp {{ number_format($saldoKas, 0, ',', '.') }}</h3>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center shadow-inner group-hover:rotate-12 transition-transform duration-300">
                <i class="fa-solid fa-wallet text-xl"></i>
            </div>
        </div>
        <div class="flex items-center text-sm">
            <span class="text-emerald-500 flex items-center font-medium bg-emerald-50 px-2 py-0.5 rounded-full"><i class="fa-solid fa-arrow-trend-up mr-1 text-xs"></i> 0%</span>
            <span class="text-slate-400 ml-2">dari bulan lalu</span>
        </div>
    </div>

    <!-- Pemasukan Card -->
    <div class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1 group">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-linear-to-br from-indigo-400 to-indigo-500 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500 ease-in-out"></div>
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Total Pemasukan</p>
                <h3 class="text-3xl font-bold text-slate-800">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
            </div>
            <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-xl flex items-center justify-center shadow-inner group-hover:rotate-12 transition-transform duration-300">
                <i class="fa-solid fa-arrow-down text-xl"></i>
            </div>
        </div>
        <div class="flex items-center text-sm">
            <span class="text-indigo-500 flex items-center font-medium bg-indigo-50 px-2 py-0.5 rounded-full"><i class="fa-solid fa-arrow-trend-up mr-1 text-xs"></i> 0%</span>
            <span class="text-slate-400 ml-2">dari bulan lalu</span>
        </div>
    </div>

    <!-- Pengeluaran Card -->
    <div class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1 group">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-linear-to-br from-rose-400 to-rose-500 rounded-full opacity-20 group-hover:scale-150 transition-transform duration-500 ease-in-out"></div>
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Total Pengeluaran</p>
                <h3 class="text-3xl font-bold text-slate-800">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
            </div>
            <div class="w-12 h-12 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center shadow-inner group-hover:-rotate-12 transition-transform duration-300">
                <i class="fa-solid fa-arrow-up text-xl"></i>
            </div>
        </div>
        <div class="flex items-center text-sm">
            <span class="text-rose-500 flex items-center font-medium bg-rose-50 px-2 py-0.5 rounded-full"><i class="fa-solid fa-arrow-trend-down mr-1 text-xs"></i> 0%</span>
            <span class="text-slate-400 ml-2">dari bulan lalu</span>
        </div>
    </div>
</div>


{{-- start chart --}}
<!-- Section Diagram -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-slate-800"><i class="fa-solid fa-chart-line mr-2 text-indigo-500"></i> Tren Keuangan 7 Hari Terakhir</h3>
    </div>
    <div style="height: 300px;">
        <canvas id="financeChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('financeChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartLabels),
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: @json($chartPemasukan),
                        backgroundColor: 'rgba(16, 185, 129, 0.7)', // Emerald
                        borderColor: '#10b981',
                        borderWidth: 1,
                        borderRadius: 5,
                    },
                    {
                        label: 'Pengeluaran',
                        data: @json($chartPengeluaran),
                        backgroundColor: 'rgba(244, 63, 94, 0.7)', // Rose
                        borderColor: '#f43f5e',
                        borderWidth: 1,
                        borderRadius: 5,
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
                            font: { family: 'Inter', size: 12 }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: { size: 14, weight: 'bold' },
                        bodyFont: { size: 13 },
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) label += ': ';
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [5, 5], color: '#e2e8f0' },
                        ticks: {
                            font: { family: 'Inter' },
                            callback: function(value) {
                                if (value >= 1000000) return 'Rp ' + (value/1000000) + 'jt';
                                if (value >= 1000) return 'Rp ' + (value/1000) + 'rb';
                                return 'Rp ' + value;
                            }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Inter' } }
                    }
                }
            }
        });
    });
</script>
{{-- end chart --}}

<!-- Navigasi Menu Riwayat -->
<div class="mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
    <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center">
        <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-500 flex items-center justify-center mr-3">
            <i class="fa-solid fa-clock-rotate-left"></i>
        </div>
        Pintasan Menu Riwayat
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Riwayat Pemasukan -->
        <a href="/history/pemasukan" class="group bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_2px_10px_rgb(0,0,0,0.02)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 relative overflow-hidden flex items-center justify-between">
            <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-500 opacity-5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-150 duration-500"></div>
            <div class="flex items-center gap-4 relative z-10">
                <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-arrow-down text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">Riwayat Pemasukan</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Lihat semua pemasukan</p>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-emerald-500 transition-colors group-hover:translate-x-1 duration-300 relative z-10"></i>
        </a>

        <!-- Riwayat Pengeluaran -->
        <a href="/history/pengeluaran" class="group bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_2px_10px_rgb(0,0,0,0.02)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 relative overflow-hidden flex items-center justify-between">
            <div class="absolute top-0 right-0 w-20 h-20 bg-rose-500 opacity-5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-150 duration-500"></div>
            <div class="flex items-center gap-4 relative z-10">
                <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-500 group-hover:bg-rose-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-arrow-up text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 group-hover:text-rose-600 transition-colors">Riwayat Pengeluaran</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Lihat semua pengeluaran</p>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-rose-500 transition-colors group-hover:translate-x-1 duration-300 relative z-10"></i>
        </a>

        <!-- Semua Transaksi -->
        <a href="/history/transaksi" class="group bg-white p-5 rounded-2xl border border-slate-100 shadow-[0_2px_10px_rgb(0,0,0,0.02)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 relative overflow-hidden flex items-center justify-between">
            <div class="absolute top-0 right-0 w-20 h-20 bg-indigo-500 opacity-5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-150 duration-500"></div>
            <div class="flex items-center gap-4 relative z-10">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500 group-hover:bg-indigo-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-receipt text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Semua Transaksi</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Gabungan semua riwayat</p>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right text-slate-300 group-hover:text-indigo-500 transition-colors group-hover:translate-x-1 duration-300 relative z-10"></i>
        </a>
    </div>
</div>


<div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s;">

    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
        <h3 class="text-lg font-bold text-slate-800"><a href="/history/transaksi"><i class="fa-solid fa-list-ul mr-2 text-indigo-500"></i></a> 5 Transaksi Terbaru</h3>
        <a href="/history/transaksi" class="text-sm text-indigo-600 font-medium hover:text-indigo-700 transition-colors">Lihat Semua <i class="fa-solid fa-chevron-right text-xs ml-1"></i></a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">Tanggal</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Jenis</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Deskripsi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-right">Jumlah</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-center">Sumber</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($transaksiTerbaru as $tr)
                <tr class="hover:bg-slate-50 transition-colors group">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-slate-800">{{ \Carbon\Carbon::parse($tr->tanggal)->format('d M Y') }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            @if($tr->jenis == 'Pemasukan')
                            <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-500">
                                <i class="fa-solid fa-arrow-down text-xs"></i>
                            </div>
                            @else
                            <div class="w-8 h-8 rounded-full bg-rose-50 flex items-center justify-center text-rose-500">
                                <i class="fa-solid fa-arrow-up text-xs"></i>
                            </div>
                            @endif
                            <div class="text-sm font-medium text-slate-800">{{ $tr->jenis }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-slate-600">{{ $tr->deskripsi }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        @if($tr->jenis == 'Pemasukan')
                        <span class="text-emerald-600 font-bold">+ Rp {{ number_format($tr->jumlah, 0, ',', '.') }}</span>
                        @else
                        <span class="text-rose-600 font-bold">- Rp {{ number_format($tr->jumlah, 0, ',', '.') }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $tr->sumber == 'pemasukan' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                            {{ ucfirst($tr->sumber) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-slate-400 group">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                                <i class="fa-solid fa-receipt text-3xl text-slate-300 group-hover:text-indigo-300 transition-colors"></i>
                            </div>
                            <p class="text-base font-medium text-slate-600">Belum ada data transaksi</p>
                            <p class="text-sm mt-1">Transaksi Anda akan muncul di sini.</p>
                            <a href="/pemasukan" class="mt-4 inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                                <i class="fa-solid fa-plus mr-1.5"></i> Tambah Transaksi
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

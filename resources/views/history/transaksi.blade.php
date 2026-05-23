@extends('layouts.app')

@section('content')

<div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div class="flex items-center gap-4">
        <a href="/" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:border-indigo-200 hover:bg-indigo-50 transition-all shadow-sm hover:scale-110">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Semua Transaksi</h2>
            <p class="text-slate-500 mt-1">Gabungan seluruh riwayat pemasukan dan pengeluaran.</p>
        </div>
    </div>
    <div class="flex gap-2">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fa-solid fa-search text-slate-400"></i>
            </div>
            <input type="text" placeholder="Cari transaksi..." class="pl-10 border border-slate-200 text-sm text-slate-700 rounded-xl px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition-all w-full md:w-64">
        </div>
        <button class="px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors shadow-sm flex items-center gap-2">
            <i class="fa-solid fa-sliders"></i> Filter
        </button>
    </div>
</div>

<div class="flex gap-4 mb-6">
    <div class="flex items-center gap-2 text-sm text-slate-600 bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm">
        <span class="w-3 h-3 rounded-full bg-emerald-500"></span> Pemasukan
    </div>
    <div class="flex items-center gap-2 text-sm text-slate-600 bg-white px-4 py-2 rounded-lg border border-slate-200 shadow-sm">
        <span class="w-3 h-3 rounded-full bg-rose-500"></span> Pengeluaran
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs text-slate-500 uppercase bg-slate-50/80 border-b border-slate-100">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">Tanggal</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Keterangan / Kategori</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Jenis</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-right">Jumlah Transaksi</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-center">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($semuaTransaksi as $tr)
                <tr class="hover:bg-slate-50 transition-colors group">
                    <td class="px-6 py-4 whitespace-nowrap text-slate-500">
                        {{ \Carbon\Carbon::parse($tr->tanggal)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-slate-800 font-medium whitespace-nowrap">
                        {{ $tr->deskripsi }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            @if($tr->jenis == 'Pemasukan')
                            <div class="w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-500">
                                <i class="fa-solid fa-arrow-down text-[10px]"></i>
                            </div>
                            @else
                            <div class="w-6 h-6 rounded-full bg-rose-50 flex items-center justify-center text-rose-500">
                                <i class="fa-solid fa-arrow-up text-[10px]"></i>
                            </div>
                            @endif
                            <span>{{ $tr->jenis }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        @if($tr->jenis == 'Pemasukan')
                        <span class="text-emerald-600 font-bold">+ Rp {{ number_format($tr->masuk, 0, ',', '.') }}</span>
                        @else
                        <span class="text-rose-600 font-bold">- Rp {{ number_format($tr->keluar, 0, ',', '.') }}</span>
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
                            <p class="text-sm mt-1">Lakukan transaksi untuk melihat riwayat di sini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="p-4 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500 bg-slate-50/50">
        <span>Menampilkan 0 dari 0 data</span>
        <div class="flex gap-1">
            <button class="px-3 py-1 border border-slate-200 rounded text-slate-400 cursor-not-allowed">Sebelumnya</button>
            <button class="px-3 py-1 border border-slate-200 rounded text-slate-400 cursor-not-allowed">Selanjutnya</button>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="/"
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:border-rose-200 hover:bg-rose-50 transition-all shadow-sm hover:scale-110">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Riwayat Pengeluaran</h2>
                <p class="text-slate-500 mt-1">Daftar seluruh transaksi pengeluaran UMKM Anda.</p>
            </div>
        </div>
        <div class="flex gap-2">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-solid fa-search text-slate-400"></i>
                </div>
                <input type="text" placeholder="Cari transaksi..."
                    class="pl-10 border border-slate-200 text-sm text-slate-700 rounded-xl px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 shadow-sm transition-all w-full md:w-64">
            </div>
            <button
                class="px-4 py-2.5 text-sm font-medium text-white bg-rose-500 rounded-xl hover:bg-rose-600 transition-colors shadow-sm shadow-rose-200 flex items-center gap-2">
                <i class="fa-solid fa-filter"></i> Filter
            </button>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-slate-50/80 border-b border-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">Tanggal</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Nama Bahan / Keperluan</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center">Kuantitas</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Catatan</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-right">Total Pengeluaran</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($pengeluaran as $item)
                        <tr class="hover:bg-slate-50 transition-colors duration-150 group">
                            <td class="px-6 py-4 text-slate-500">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                            <td class="px-6 py-4 font-medium text-slate-800">{{ $item->bahan }}</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center justify-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-700">
                                    {{ $item->jumlah }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-sm">{{ $item->keterangan ?: '-' }}</td>
                            <td class="px-6 py-4 text-right font-semibold text-rose-600">
                                - Rp {{ number_format($item->harga_total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400 group">
                                    <div
                                        class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                                        <i
                                            class="fa-solid fa-cart-shopping text-3xl text-slate-300 group-hover:text-rose-300 transition-colors"></i>
                                    </div>
                                    <p class="text-base font-medium text-slate-600">Belum ada data pengeluaran</p>
                                    <p class="text-sm mt-1">Catat transaksi pengeluaran pertama Anda.</p>
                                    <a href="/pengeluaran"
                                        class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-100 transition-colors">
                                        <i class="fa-solid fa-plus mr-1.5"></i> Tambah Pengeluaran
                                    </a>
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
                <button
                    class="px-3 py-1 border border-slate-200 rounded text-slate-400 cursor-not-allowed">Sebelumnya</button>
                <button
                    class="px-3 py-1 border border-slate-200 rounded text-slate-400 cursor-not-allowed">Selanjutnya</button>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="/"
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-violet-600 hover:border-violet-200 hover:bg-violet-50 transition-all shadow-sm hover:scale-110">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Daftar Produk</h2>
                <p class="text-slate-500 mt-1">Daftar seluruh produk UMKM Anda.</p>
            </div>
        </div>
        <div class="flex gap-2">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-solid fa-search text-slate-400"></i>
                </div>
                <input type="text" placeholder="Cari transaksi..."
                    class="pl-10 border border-slate-200 text-sm text-slate-700 rounded-xl px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-violet-500 shadow-sm transition-all w-full md:w-64">
            </div>
            <button
                class="px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-filter"></i> Filter
            </button>
            <a href="{{ route('produk.create') }}"
                class="px-4 py-2.5 text-sm font-medium text-white bg-violet-600 rounded-xl hover:bg-violet-700 transition-colors shadow-sm shadow-violet-200 flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Tambah Produk
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-slate-50/80 border-b border-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">Nama Produk</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Harga Jual</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Satuan</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center w-28">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($produks as $item)
                        <tr class="hover:bg-slate-50 transition-colors duration-150 group">
                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $item->nama_produk }}
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-sm">
                                Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-sm">
                                {{ $item->satuan }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-1">
                                    <a href="/produk/{{ $item->id }}/edit" 
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/produk/{{ $item->id }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Hapus">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400 group">
                                    <div
                                        class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
                                        <i
                                            class="fa-solid fa-cart-shopping text-3xl text-slate-300 group-hover:text-violet-300 transition-colors"></i>
                                    </div>
                                    <p class="text-base font-medium text-slate-600">Belum ada data produk</p>
                                    <p class="text-sm mt-1">List Produk yang tersedia.</p>
                                    <a href="/produk/create"
                                        class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-violet-600 bg-violet-50 rounded-lg hover:bg-violet-100 transition-colors">
                                        <i class="fa-solid fa-plus mr-1.5"></i> Tambah Produk
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

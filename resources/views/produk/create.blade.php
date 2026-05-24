@extends('layouts.app')

@section('content')
    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('produk.index') }}"
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-violet-600 hover:border-violet-200 hover:bg-violet-50 transition-all shadow-sm hover:scale-110">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Tambah Produk</h2>
            <p class="text-slate-500 mt-1">Masukkan data produk baru Anda.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
        <form action="{{ route('produk.store') }}" method="POST" class="p-6 md:p-8">
            @csrf

            <div class="space-y-6">
                <!-- Nama Produk -->
                <div>
                    <label for="nama_produk" class="block text-sm font-medium text-slate-700 mb-2">
                        Nama Produk <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-box text-slate-400"></i>
                        </div>
                        <input type="text" name="nama_produk" id="nama_produk" required value="{{ old('nama_produk') }}"
                            class="pl-11 w-full border @error('nama_produk') border-rose-300 focus:ring-rose-500 @else border-slate-200 focus:ring-violet-500 @enderror text-slate-700 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 shadow-sm transition-all"
                            placeholder="Contoh: Keripik Pisang">
                    </div>
                    @error('nama_produk')
                        <p class="mt-2 text-sm text-rose-500 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Harga Jual -->
                <div>
                    <label for="harga_jual" class="block text-sm font-medium text-slate-700 mb-2">
                        Harga Jual <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none font-medium text-slate-500">
                            Rp
                        </div>
                        <input type="number" name="harga_jual" id="harga_jual" required min="0" step="0.01" value="{{ old('harga_jual') }}"
                            class="pl-12 w-full border @error('harga_jual') border-rose-300 focus:ring-rose-500 @else border-slate-200 focus:ring-violet-500 @enderror text-slate-700 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 shadow-sm transition-all"
                            placeholder="0">
                    </div>
                    @error('harga_jual')
                        <p class="mt-2 text-sm text-rose-500 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Satuan -->
                <div>
                    <label for="satuan" class="block text-sm font-medium text-slate-700 mb-2">
                        Satuan <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-ruler-combined text-slate-400"></i>
                        </div>
                        <input type="text" name="satuan" id="satuan" required value="{{ old('satuan') }}"
                            class="pl-11 w-full border @error('satuan') border-rose-300 focus:ring-rose-500 @else border-slate-200 focus:ring-violet-500 @enderror text-slate-700 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 shadow-sm transition-all"
                            placeholder="Contoh: Kg">
                    </div>
                    @error('satuan')
                        <p class="mt-2 text-sm text-rose-500 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="{{ route('produk.index') }}"
                    class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-violet-600 rounded-xl hover:bg-violet-700 transition-colors shadow-sm shadow-violet-200 flex items-center gap-2">
                    <i class="fa-solid fa-save"></i> Simpan Produk
                </button>
            </div>
        </form>
    </div>
@endsection

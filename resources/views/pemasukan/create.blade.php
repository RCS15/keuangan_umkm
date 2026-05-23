@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Form Pemasukan</h2>
                <p class="text-slate-500 text-sm mt-1">Catat transaksi pemasukan baru untuk UMKM Anda.</p>
            </div>
            <a href="/"
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:border-indigo-200 hover:bg-indigo-50 transition-all shadow-sm hover:scale-110">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <div
            class="bg-white p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden animate-fade-in-up">
            <!-- Decorative element -->
            <div
                class="absolute top-0 right-0 w-32 h-32 bg-indigo-500 opacity-5 rounded-bl-full -mr-10 -mt-10 pointer-events-none">
            </div>

            <form class="space-y-6 relative z-10" method="post" action="/pemasukan/store">
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Produk <span
                                class="text-rose-500">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full appearance-none border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all cursor-pointer" name="produk">
                                <option value="" disabled selected>Pilih produk...</option>
                                <option>Keripik Singkong</option>
                                <option>Keripik Pisang</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Tanggal Transaksi <span
                                class="text-rose-500">*</span></label>
                        <input type="date"
                            class="w-full border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" name="tanggal">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Jumlah (Bungkus) <span
                                class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-box-open text-slate-400"></i>
                            </div>
                            <input type="number" id="jumlah" min="0" placeholder="0"
                                class="w-full pl-10 border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" name="jumlah">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Harga Satuan <span
                                class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-400 font-medium">Rp</span>
                            </div>
                            <input type="number" id="harga" min="0" placeholder="0"
                                class="w-full pl-12 border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" name="harga_per_bungkus">
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Total Pemasukan</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-emerald-600 font-bold">Rp</span>
                        </div>
                        <input type="text" id="total" readonly placeholder="0"
                            class="w-full pl-12 border border-emerald-200 text-emerald-700 font-bold text-lg rounded-xl px-4 py-3 bg-emerald-50 focus:outline-none transition-all cursor-not-allowed" name="total">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Catatan Tambahan</label>
                    <textarea rows="3" placeholder="Misal: Pembeli tunai, pesanan khusus..."
                        class="w-full border border-slate-200 text-slate-700 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all resize-none" name="keterangan"></textarea>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                    <button type="button"
                        class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-slate-800 transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all shadow-md shadow-indigo-200 flex items-center gap-2 group">
                        <i class="fa-solid fa-check group-hover:scale-110 transition-transform"></i> Simpan Pemasukan
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection

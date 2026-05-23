@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Form Pengeluaran</h2>
                <p class="text-slate-500 text-sm mt-1">Catat transaksi pengeluaran baru untuk UMKM Anda.</p>
            </div>
            <a href="/"
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:border-rose-200 hover:bg-rose-50 transition-all shadow-sm hover:scale-110">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        <div
            class="bg-white p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden animate-fade-in-up">
            <!-- Decorative element -->
            <div
                class="absolute top-0 right-0 w-32 h-32 bg-rose-500 opacity-5 rounded-bl-full -mr-10 -mt-10 pointer-events-none">
            </div>

            <form class="space-y-6 relative z-10">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700">Nama Keperluan / Bahan <span
                                class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-cart-shopping text-slate-400"></i>
                            </div>
                            <input type="text" placeholder="Misal: Beli minyak goreng 5L"
                                class="w-full pl-10 border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Jumlah / Kuantitas <span
                                class="text-rose-500">*</span></label>
                        <input type="number" min="0" placeholder="0"
                            class="w-full border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Tanggal Pengeluaran <span
                                class="text-rose-500">*</span></label>
                        <input type="date"
                            class="w-full border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Total Harga <span
                            class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-rose-600 font-bold">Rp</span>
                        </div>
                        <input type="number" min="0" placeholder="0"
                            class="w-full pl-12 border border-rose-200 text-rose-700 font-bold text-lg rounded-xl px-4 py-3 bg-rose-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">Catatan Tambahan</label>
                    <textarea rows="3" placeholder="Informasi tambahan terkait pengeluaran..."
                        class="w-full border border-slate-200 text-slate-700 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all resize-none"></textarea>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                    <button type="button"
                        class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-slate-800 transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-medium text-white bg-rose-500 rounded-xl hover:bg-rose-600 focus:ring-4 focus:ring-rose-100 transition-all shadow-md shadow-rose-200 flex items-center gap-2 group">
                        <i class="fa-solid fa-check group-hover:scale-110 transition-transform"></i> Simpan Pengeluaran
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection

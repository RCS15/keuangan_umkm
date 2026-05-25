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

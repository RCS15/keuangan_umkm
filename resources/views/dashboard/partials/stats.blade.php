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

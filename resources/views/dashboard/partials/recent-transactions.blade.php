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

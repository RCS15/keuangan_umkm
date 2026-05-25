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

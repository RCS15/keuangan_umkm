<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyBooks</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col">

<!-- Navbar -->
<nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="shrink-0 flex items-center gap-3 group cursor-pointer">
                <div class="w-10 h-10 bg-linear-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200 transform group-hover:rotate-12 transition-all duration-300">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight bg-clip-text text-transparent bg-linear-to-r from-indigo-600 to-purple-600">TinyBooks</h1>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-400 hover:text-indigo-600 transition-colors duration-200 rounded-full hover:bg-slate-100">
                    <i class="fa-regular fa-bell text-xl"></i>
                </button>
                <div class="h-9 w-9 rounded-full bg-linear-to-r from-cyan-400 to-blue-500 flex items-center justify-center text-white font-semibold shadow-sm cursor-pointer hover:ring-2 ring-offset-2 ring-blue-400 transition-all transform hover:scale-105">
                    U
                </div>
            </div>
        </div>
    </div>
</nav>

<main class="grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in-up">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white border-t border-slate-200 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <p class="text-center text-sm text-slate-500">© {{ date('Y') }} TinyBooks. Dibuat dengan <i class="fa-solid fa-heart text-red-500 animate-pulse mx-1"></i> untuk UMKM.</p>
    </div>
</footer>

<script>
    const jumlah = document.getElementById('jumlah');
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');

    function hitungTotal() {
        if(jumlah && harga && total) {
            let j = parseFloat(jumlah.value) || 0;
            let h = parseFloat(harga.value) || 0;
            total.value = j * h;
        }
    }

    if(jumlah && harga) {
        jumlah.addEventListener('input', hitungTotal);
        harga.addEventListener('input', hitungTotal);
    }
</script>

<style>
    /* Custom animation classes */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
</style>

</body>
</html>

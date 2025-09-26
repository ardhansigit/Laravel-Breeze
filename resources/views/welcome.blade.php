<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinity Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background-color: #0f172a;
            background-image: radial-gradient(at 0% 0%, rgba(20, 184, 166, 0.2), transparent 50%), radial-gradient(at 100% 100%, rgba(251, 191, 36, 0.2), transparent 50%);
        }
        .cta-button {
            background-color: #10b981;
            transition: transform 0.2s ease-in-out;
        }
        .cta-button:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen hero-bg sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-white underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>
                @endauth
            </div>
        @endif

        <!-- Hero Section Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-white text-center z-0">
            <div class="mb-4">
                <i class="fas fa-chart-line text-6xl text-yellow-300 animate-pulse"></i>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold tracking-tight leading-tight mb-4">
                Kelola Keuangan Anda<br>dengan <span class="text-teal-400">Infinity Dashboard</span>
            </h1>
            <p class="text-lg sm:text-xl font-light mb-8 max-w-2xl mx-auto opacity-90">
                Solusi cerdas untuk memantau finansial Anda.
            </p>
            <a href="{{ route('register') }}" class="inline-block cta-button text-white font-bold py-3 px-8 rounded-full shadow-lg">
                Mulai Sekarang
            </a>
        </div>
    </div>
</body>
</html>

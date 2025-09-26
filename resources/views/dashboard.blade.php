<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight flex items-center gap-2">
            📊 {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Profil -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 text-center hover:shadow-xl transition">
                <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
    alt="Foto Profil"
    class="w-[50px] h-[50px] rounded-full mx-auto mb-4 border-4 border-blue-500 shadow object-cover">

                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</h3>
                <p class="text-gray-500 text-sm">{{ Auth::user()->username ?? 'username' }}</p>
            </div>

            <!-- Balance -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 flex items-center gap-2">
                    💰 Saldo Saat Ini
                </h3>
                <p class="text-3xl font-bold text-green-500 mt-3">
                    Rp {{ number_format(Auth::user()->balance ?? 0, 0, ',', '.') }}
                </p>
            </div>

            <!-- Ringkasan Bulan -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3 flex items-center gap-2">
                    📅 Ringkasan Bulan Ini
                </h3>
                <p class="text-gray-600 dark:text-gray-400">Pemasukan:
                    <span class="text-green-500 font-bold">
                        Rp {{ number_format($income ?? 0, 0, ',', '.') }}
                    </span>
                </p>
                <p class="text-gray-600 dark:text-gray-400">Pengeluaran:
                    <span class="text-red-500 font-bold">
                        Rp {{ number_format($expense ?? 0, 0, ',', '.') }}
                    </span>
                </p>
            </div>

        </div>
    </div>
</x-app-layout>

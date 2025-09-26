<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wallet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Saldo -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <h3 class="text-lg font-semibold">Saldo Saat Ini</h3>
                <p class="text-2xl font-bold text-green-600">
                    Rp {{ number_format(Auth::user()->balance, 0, ',', '.') }}
                </p>
            </div>

            <!-- Form Topup/Withdraw -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-400 rounded">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-3 bg-red-100 text-red-800 border border-red-400 rounded">
                        ❌ {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('wallet.process') }}" method="POST">
                    @csrf

                    <!-- Pilih Jenis Transaksi -->
                    <div class="mb-4">
                        <label for="type" class="block font-medium">Jenis Transaksi</label>
                        <select name="type" id="type" class="w-full border rounded px-3 py-2">
                            <option value="Topup">Topup</option>
                            <option value="Withdraw">Withdraw</option>
                        </select>
                    </div>

                    <!-- Input Nominal -->
                    <div class="mb-4">
                        <label for="amount" class="block font-medium">Nominal</label>
                        <input type="number" name="amount" id="amount" class="w-full border rounded px-3 py-2"
                            min="1" required>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded 
                               hover:bg-blue-700 transition border border-black 
                               focus:outline-none focus:ring-2 focus:ring-blue-400">
                        💰 Submit
                    </button>
                </form>
            </div>

            <!-- Riwayat Transaksi -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Riwayat Transaksi</h3>
                <table class="w-full text-left border">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Jenis</th>
                            <th class="p-2">Nominal</th>
                            <th class="p-2">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $tx)
                            <tr class="border-t">
                                <td class="p-2">{{ $tx->created_at->format('d M Y H:i') }}</td>
                                <td class="p-2">{{ $tx->type }}</td>
                                <td class="p-2">Rp {{ number_format($tx->amount, 0, ',', '.') }}</td>
                                <td class="p-2">{{ $tx->description }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-2">Belum ada transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

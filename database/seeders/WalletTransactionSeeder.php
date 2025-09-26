<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WalletTransaction;

class WalletTransactionSeeder extends Seeder
{
    public function run(): void
    {
        // ambil user pertama (pastikan ada user di tabel users)
        $user = User::first();

        if ($user) {
            // tambahkan saldo awal biar tidak minus
            $user->balance = 500000;
            $user->save();

            // contoh transaksi
            WalletTransaction::create([
                'user_id' => $user->id,
                'type' => 'Topup',
                'amount' => 200000,
                'description' => 'Topup saldo awal',
            ]);

            WalletTransaction::create([
                'user_id' => $user->id,
                'type' => 'Withdraw',
                'amount' => 50000,
                'description' => 'Tarik tunai pertama',
            ]);

            WalletTransaction::create([
                'user_id' => $user->id,
                'type' => 'Topup',
                'amount' => 150000,
                'description' => 'Topup tambahan',
            ]);
        }
    }
}

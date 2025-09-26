<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WalletTransaction;

class WalletController extends Controller
{
    // Tampilkan halaman wallet
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $transactions = Auth::user()->transactions()->latest()->get();

        return view('wallet', compact('transactions'));
    }

    // Proses topup / withdraw
    public function process(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Topup,Withdraw',
            'amount' => 'required|numeric|min:1',
        ]);
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $type = $request->type;
        $amount = $request->amount;

        if ($type === 'Topup') {
            $user->balance += $amount;
            $description = 'Topup saldo';
        } else {
            if ($user->balance < $amount) {
                return back()->with('error', 'Saldo tidak mencukupi untuk withdraw!');
            }
            $user->balance -= $amount;
            $description = 'Withdraw saldo';
        }

        $user->save();

        WalletTransaction::create([
            'user_id' => $user->id,
            'type' => $type,
            'amount' => $amount,
            'description' => $description,
        ]);

        return back()->with('success', $type . ' berhasil!');
    }
}

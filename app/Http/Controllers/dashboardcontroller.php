<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\WalletTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil transaksi bulan ini
        $transactions = WalletTransaction::where('user_id', $user->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        // Hitung pemasukan (Topup) & pengeluaran (Withdraw)
        $income = $transactions->where('type', 'Topup')->sum('amount');
        $expense = $transactions->where('type', 'Withdraw')->sum('amount');

        return view('dashboard', [
            'income' => $income,
            'expense' => $expense,
        ]);
    }
}
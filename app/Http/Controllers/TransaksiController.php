<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::get();

        $data = [
            'title' => 'Home',
            'transactions' => $transactions
        ];

        return view('Transaksi.index', $data);
    }
}

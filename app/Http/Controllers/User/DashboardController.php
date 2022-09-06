<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard.index');
    }

    public function wallet()
    {
        $wallet = auth()->user()->wallet;
        $data = [];
        $data['balance'] = $wallet->balance;
        $data['ledger_balance'] = $wallet->ledger_balance;
        return view('user.dashboard.wallet', $data);
    }
}

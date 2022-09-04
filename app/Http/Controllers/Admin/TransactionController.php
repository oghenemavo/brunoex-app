<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function bonus()
    {
        return view('admin.dashboard.bonus');
    }

    public function makeDeposit(Request $request)
    {
        // $data = $request->validated();
        // $this->userTransactionRepository->depositRequest($data);

        return redirect()->route('user.deposit')->with('success', 'Bonus Initiated Successfully');
    }

    public function penalty()
    {
        return view('admin.dashboard.penalty');
    }

    public function makeWithdrawal(Request $request)
    {
        // $data = $request->validated();
        // $this->userTransactionRepository->withdrawRequest($data);

        return redirect()->route('user.withdraw')->with('success', 'Penalty Initiated Successfully');
    }

    public function deposit()
    {
        return view('user.dashboard.transfer');
    }

    public function validateDeposit(Request $request)
    {
        $data = $request->validated();

        // if ($this->userTransactionRepository->transfer($data)) {
        //     return redirect()->route('user.transfer')->with('success', 'Transfer Successful');
        // }
        return redirect()->route('user.transfer')->with('danger', 'Unable to perform transfer');
    }

    public function withdraw()
    {
        return view('admin.dashboard.transfer');
    }

    public function validateWithdrawal(Request $request)
    {
        // $data = $request->validated();

        // if ($this->userTransactionRepository->transfer($data)) {
        //     return redirect()->route('user.transfer')->with('success', 'Transfer Successful');
        // }
        return redirect()->route('user.transfer')->with('danger', 'Unable to perform transfer');
    }
}

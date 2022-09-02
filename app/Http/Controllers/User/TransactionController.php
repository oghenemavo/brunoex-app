<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use App\Repositories\UserTransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(protected UserTransactionRepository $userTransactionRepository)
    {
        
    }

    public function deposit()
    {
        return view('user.dashboard.deposit');
    }

    public function makeDeposit(DepositRequest $request)
    {
        $data = $request->validated();
        $this->userTransactionRepository->depositRequest($data);

        return redirect()->route('user.deposit')->with('success', 'Deposit Requested, Admin Verification');
    }

    public function withdraw()
    {
        return view('user.dashboard.withdraw');
    }

    public function makeWithdrawal(DepositRequest $request)
    {
        $data = $request->validated();
        $this->userTransactionRepository->withdrawRequest($data);

        return redirect()->route('user.withdraw')->with('success', 'Withdrawal Requested, Admin Verification');
    }
}

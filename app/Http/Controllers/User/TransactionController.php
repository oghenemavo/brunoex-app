<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransferRequest;
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
        
        if ($this->userTransactionRepository->depositRequest($data)) {
            return response()->json(['status' => true, 'message' => 'Deposit Requested, Admin Verifying shortly']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to Deposit right now contact Admin']);
    }

    public function withdraw()
    {
        $data= [];
        $data['balance'] = auth('web')->user()->wallet->balance;
        return view('user.dashboard.withdraw', $data);
    }

    public function makeWithdrawal(DepositRequest $request)
    {
        $data = $request->validated();
        $user = auth('web')->user();
        
        if (validBalance($user, $request->amount)) {
            if ($this->userTransactionRepository->withdrawRequest($data)) {
                return response()->json(['status' => true, 'message' => 'Withdrawal Requested, Admin Verifying shortly']);
            }
            return response()->json(['status' => false, 'message' => 'Unable to Withdraw right now contact Admin']);
        }
        return response()->json(['status' => false, 'message' => 'Insufficient Balance']);
    }

    public function transfer()
    {
        $data= [];
        $data['balance'] = auth('web')->user()->wallet->balance;
        return view('user.dashboard.transfer', $data);
    }

    public function makeTransfer(TransferRequest $request)
    {
        $data = $request->validated();
        $user = auth('web')->user();

        if (validBalance($user, $request->amount)) {
            if ($this->userTransactionRepository->withdrawRequest($data)) {
                return response()->json(['status' => true, 'message' => 'Transfer Successful']);
            }
            return response()->json(['status' => false, 'message' => 'Unable to perform transfer']);
        }
        return response()->json(['status' => false, 'message' => 'Insufficient Balance']);
    }
}

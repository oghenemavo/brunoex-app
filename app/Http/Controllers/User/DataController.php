<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\MiscRepository;
use App\Repositories\UserTransactionRepository;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function __construct(
        protected UserTransactionRepository $transactionRepository,
        protected MiscRepository $miscRepository,
    )
    {
        
    }
    
    public function allTransactions()
    {
        $user = auth('web')->user();
        $transactions = $this->transactionRepository->fetchUserTransactions($user->id);
        return response()->json(['transactions' => $transactions]);
    }

    public function allTransactionsRequest()
    {
        $user = auth('web')->user();
        $transactions = $this->transactionRepository->fetchUserTransactionsRequest($user->id);
        return response()->json(['transactions' => $transactions]);
    }

    public function allTransactionsTreatedRequest()
    {
        $user = auth('web')->user();
        $transactions = $this->transactionRepository->fetchTransactionsTreatedRequest($user->id);
        return response()->json(['transactions' => $transactions]);
    }

    public function allInvestment()
    {
        $user = auth('web')->user();
        $investments = $this->miscRepository->fetchUserInvestments($user->id);
        return response()->json(['investments' => $investments]);
    }

}

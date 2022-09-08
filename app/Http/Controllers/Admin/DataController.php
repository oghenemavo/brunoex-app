<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MiscRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function __construct(
        protected TransactionRepository $transactionRepository,
        protected MiscRepository $miscRepository,
    )
    {
        
    }
    
    public function allTransactions()
    {
        $transactions = $this->transactionRepository->fetchTransactions();
        return response()->json(['transactions' => $transactions]);
    }

    public function allTransactionsRequest()
    {
        $transactions = $this->transactionRepository->fetchTransactionsRequest();
        return response()->json(['transactions' => $transactions]);
    }

    public function allTransactionsTreatedRequest()
    {
        $transactions = $this->transactionRepository->fetchTransactionsTreatedRequest();
        return response()->json(['transactions' => $transactions]);
    }

    public function allInvestment()
    {
        $investments = $this->transactionRepository->fetchInvestments();
        return response()->json(['investments' => $investments]);
    }

    public function allUser()
    {
        $users = $this->miscRepository->fetchUser();
        return response()->json(['users' => $users]);
    }
}

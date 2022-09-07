<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BonusRequest;
use App\Http\Requests\ValidateDepositRequest;
use App\Models\TransactionRequest;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct(protected TransactionRepository $transactionRepository)
    {
    }

    public function bonus()
    {
        return view('admin.transactions.bonus');
    }

    public function addBonus(BonusRequest $request)
    {
        $data = $request->validated();
        if ($this->transactionRepository->bonus($data)) {
            return response()->json(['status' => true, 'message' => 'Bonus Initiated Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to Initiated Bonus']);
    }

    public function penalty()
    {
        return view('admin.transactions.penalty');
    }

    public function addPenalty(BonusRequest $request)
    {
        $data = $request->validated();
        if ($this->transactionRepository->penalty($data)) {
            return response()->json(['status' => true, 'message' => 'Penalty Initiated Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to Initiated Penalty']);
    }

    public function deposit()
    {
        return view('admin.transactions.deposit', ['deposit' => TransactionRequest::find('2')]);
    }

    public function validateDeposit(ValidateDepositRequest $request, TransactionRequest $deposit)
    {
        $data = $request->validated();

        if ($this->transactionRepository->validateDeposit($data, $deposit)) {
            return response()->json(['status' => true, 'message' => 'Deposit Initiated Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to Initiated Deposit']);
    }

    public function withdraw()
    {
        return view('admin.transactions.withdraw', ['withdraw' => TransactionRequest::find('3')]);
    }

    public function validateWithdrawal(ValidateDepositRequest $request, TransactionRequest $withdraw)
    {
        $data = $request->validated();

        if ($this->transactionRepository->validateWithdraw($data, $withdraw)) {
            return response()->json(['status' => true, 'message' => 'Withdraw Initiated Successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to Initiated Withdraw']);
    }
}

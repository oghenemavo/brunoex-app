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
        $this->transactionRepository->bonus($data);
        return redirect()->route('admin.bonus')->with('success', 'Bonus Initiated Successfully');
    }

    public function penalty()
    {
        return view('admin.transactions.penalty');
    }

    public function addPenalty(BonusRequest $request)
    {
        $data = $request->validated();
        $this->transactionRepository->penalty($data);
        return redirect()->route('user.penalty')->with('success', 'Penalty Initiated Successfully');
    }

    public function deposit()
    {
        return view('admin.transactions.deposit', ['deposit' => TransactionRequest::find('2')]);
    }

    public function validateDeposit(ValidateDepositRequest $request, TransactionRequest $deposit)
    {
        $data = $request->validated();

        $this->transactionRepository->validateDeposit($data, $deposit);
        return redirect()->route('admin.deposit')->with('success', 'Deposit Initiated Successfully');
    }

    public function withdraw()
    {
        return view('admin.transactions.withdraw', ['withdraw' => TransactionRequest::find('3')]);
    }

    public function validateWithdrawal(ValidateDepositRequest $request, TransactionRequest $withdraw)
    {
        $data = $request->validated();

        $this->transactionRepository->validateWithdraw($data, $withdraw);
        return redirect()->route('admin.withdraw')->with('success', 'Withdraw Initiated Successfully');
    }
}

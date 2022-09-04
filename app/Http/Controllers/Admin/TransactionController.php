<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BonusRequest;
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
        return view('adnin.transactions.transfer');
    }

    public function validateDeposit(Request $request)
    {
        $data = $request->validated();

        // if ($this->userTransactionRepository->transfer($data)) {
        //     return redirect()->route('user.transfer')->with('success', 'Transfer Successful');
        // }
        return redirect()->route('admin.deposit')->with('danger', 'Unable to perform transfer');
    }

    public function withdraw()
    {
        return view('admin.transactions.transfer');
    }

    public function validateWithdrawal(Request $request)
    {
        // $data = $request->validated();

        // if ($this->userTransactionRepository->transfer($data)) {
        //     return redirect()->route('user.transfer')->with('success', 'Transfer Successful');
        // }
        return redirect()->route('admin.withdraw')->with('danger', 'Unable to perform transfer');
    }
}

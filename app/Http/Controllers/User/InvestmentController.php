<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestRequest;
use App\Repositories\UserInvestRepository;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{

    public function __construct(protected UserInvestRepository $userInvestRepository)
    {
    }

    public function invest()
    {
        return view('user.dashboard.invest');
    }

    public function makeInvestment(InvestRequest $request)
    {
        $data = $request->validated();
        $this->userInvestRepository->invest($data);

        return redirect()->route('user.invest')->with('success', 'Investment Successful');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestRequest;
use App\Models\Plan;
use App\Repositories\UserInvestRepository;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{

    public function __construct(protected UserInvestRepository $userInvestRepository)
    {
    }

    public function index()
    {
        $data = [];
        $data['plans'] = Plan::query()->where('status', 'active')->get();
        $data['balance'] = auth('web')->user()->wallet->balance;
        return view('user.dashboard.invest', $data);
    }
    
    public function invest(InvestRequest $request)
    {
        $data = $request->validated();
        $user = auth('web')->user();

        if (validBalance($user, $request->amount)) {
            if ($this->userInvestRepository->invest($data)) {
                return response()->json(['status' => true, 'message' => 'Investment created']);
            }
            return response()->json(['status' => false, 'message' => 'Unable to setup Investment']);
        }
        return response()->json(['status' => false, 'message' => 'Insufficient Balance']);
    }

    public function plans()
    {
        $data = [];
        $data['plans'] = Plan::query()->where('status', 'active')->get();
        return view('user.dashboard.plans', $data);
    }
}

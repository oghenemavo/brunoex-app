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
        return view('user.dashboard.invest');
    }
    
    public function invest(InvestRequest $request)
    {
        $data = $request->validated();
        $this->userInvestRepository->invest($data);
        
        return redirect()->route('user.invest')->with('success', 'Investment Successful');
    }

    public function plans()
    {
        $data = [];
        $data['plans'] = Plan::query()->where('status', 'active')->get();
        return view('user.dashboard.plans', $data);
    }
}

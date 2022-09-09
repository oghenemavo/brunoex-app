<?php

namespace App\Http\Controllers\User;

use App\Enums\TransactionTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Transaction;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        $month = Carbon::now()->month;

        $data = [];
        $data['user'] = auth('web')->user();

        $data['total_investment'] = Investment::query()->where('user_id', $data['user']->id)->sum('amount');
        $data['total_investment_month'] = Investment::query()->where('user_id', $data['user']->id)->whereMonth('created_at', $month)->sum('amount');

        $data['total_deposit'] = Transaction::query()->where('user_id', $data['user']->id)->where('type', TransactionTypeEnum::CREDIT)->whereJsonContains('details->type', 'Deposit')->sum('amount');
        $data['total_deposit_month'] = Transaction::query()->where('user_id', $data['user']->id)->where('type', TransactionTypeEnum::CREDIT)->whereJsonContains('details->type', 'Deposit')->whereMonth('created_at', $month)->sum('amount');

        $data['total_withdraw'] = Transaction::query()->where('user_id', $data['user']->id)->where('type', TransactionTypeEnum::DEBIT)->whereJsonContains('details->type', 'Withdraw')->sum('amount');
        $data['total_withdraw_month'] = Transaction::query()->where('user_id', $data['user']->id)->where('type', TransactionTypeEnum::DEBIT)->whereJsonContains('details->type', 'Withdraw')->whereMonth('created_at', $month)->sum('amount');

        return view('user.dashboard.index', $data);
    }

    public function investments()
    {
        return view('user.dashboard.investment');
    }

    public function transactions()
    {
        return view('user.dashboard.transactions');
    }

    public function transactionsRequest()
    {
        return view('user.dashboard.request');
    }

    public function transactionsTreatedRequest()
    {
        return view('user.dashboard.treated-request');
    }

    public function profile()
    {
        $data = [];
        $data['user'] = auth('web')->user();

        $client =  new Client();
        $url = 'https://restcountries.com/v3.1/all?fields=name';

        $response = $client->request('GET', $url, [
            'verify' => false,
        ]);

        $data['countries'] = json_decode($response->getBody());

        return view('user.dashboard.profile', $data);
    }
    
    public function kycProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|string',
            'phone' => 'required|min:6|string',
            'gender' => 'required',
            'dob' => 'required',
        ]);

        $user = auth('web')->user();
        $user->name = $request->name;
        $user->kyc->put('phone', $request->phone);
        $user->kyc->put('gender', $request->gender);
        $user->kyc->put('dob', $request->dob);

        if ($user->save()) {
            return response()->json(['status' => true, 'message' => 'Profile updated']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to update Profile']);
    }
    
    public function kycAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|min:3|string',
            'address_two' => 'nullable|min:3|string',
            'city' => 'nullable|min:3|string',
            'state' => 'required|min:3|string',
            'zip' => 'nullable|min:3|string',
            'country' => 'required|min:3|string',
            'nation' => 'nullable|min:3|string',
        ]);

        $user = auth('web')->user();
        $user->kyc->put('address', $request->address);
        $user->kyc->put('address_two', $request->address_two);
        $user->kyc->put('city', $request->city);
        $user->kyc->put('state', $request->state);
        $user->kyc->put('zip', $request->zip);
        $user->kyc->put('country', $request->country);
        $user->kyc->put('nation', $request->nation);

        if ($user->save()) {
            return response()->json(['status' => true, 'message' => 'Profile updated']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to update Profile']);
    }

    public function security()
    {
        $data = [];
        $data['user'] = auth('web')->user();
        return view('user.dashboard.security', $data);
    }

    public function email(Request $request)
    {
        $user = auth('web')->user();
        $request->validate([
            'current' => 'required|min:6|current_password:web',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $data = $request->only(['email']);
        $user->email = $data['email'];
        if ($user->save()) {
            return response()->json(['status' => true, 'message' => 'Email Changed']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to change Email']);
    }

    public function password(Request $request)
    {
        $request->validate([
            'current' => 'required|min:6|current_password:web',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only(['password']);
        $user = auth('web')->user();
        $user->password = Hash::make($data['password']);
        if ($user->save()) {
            return response()->json(['status' => true, 'message' => 'Password Changed']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to change password']);
    }

    public function wallet()
    {
        $wallet = auth()->user()->wallet;
        $data = [];
        $data['balance'] = $wallet->balance;
        $data['ledger_balance'] = $wallet->ledger_balance;
        return view('user.dashboard.wallet', $data);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard.index');
    }

    public function profile()
    {
        $data = [];
        $data['user'] = auth('web')->user();
        return view('user.dashboard.profile', $data);
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

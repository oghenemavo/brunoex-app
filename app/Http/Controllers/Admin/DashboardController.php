<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function users()
    {
        return view('admin.dashboard.users');
    }

    public function profile()
    {
        $data = [];
        $data['user'] = auth('admin')->user();
        return view('admin.dashboard.profile', $data);
    }

    public function settings()
    {
        $data = [];
        $data['user'] = auth('admin')->user();
        return view('admin.dashboard.security', $data);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|string',
            // 'phone' => 'required|min:6|string',
            // 'gender' => 'required',
            // 'dob' => 'required',
        ]);

        $user = auth('admin')->user();
        $user->name = $request->name;
        // $user->kyc->put('phone', $request->phone);
        // $user->kyc->put('gender', $request->gender);
        // $user->kyc->put('dob', $request->dob);

        if ($user->save()) {
            return response()->json(['status' => true, 'message' => 'Profile updated']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to update Profile']);
    }

    public function email(Request $request)
    {
        $user = auth('admin')->user();
        $request->validate([
            'current' => 'required|min:6|current_password:admin',
            'email' => [
                'required',
                Rule::unique('admins')->ignore($user->id),
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
            'current' => 'required|min:6|current_password:admin',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only(['password']);
        $user = auth('admin')->user();
        $user->password = Hash::make($data['password']);
        if ($user->save()) {
            return response()->json(['status' => true, 'message' => 'Password Changed']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to change password']);
    }

}

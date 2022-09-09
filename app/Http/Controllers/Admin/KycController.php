<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    public function profile(User $user)
    {
        $data = [];
        $data['user'] = $user;
        return view('admin.kyc.profile', $data);
    }

    public function download(Request $request)
    {
        // return response()->download($request->file);
        // return Storage::download($request->file);
        // return response()->json(['status' => true]);
    }
}

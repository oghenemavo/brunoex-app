<?php

namespace App\Http\Controllers\User;

use App\Events\LoginUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function index()
    {
        return view('user.auth.signup');
    }

    public function createUser(UserCreateRequest $request)
    {
        $data = $request->validated();
        $user = $this->userRepository->createUser($data);

        if ($user) {
            return redirect()->route('homepage')->with('success', 'User Created Successfully!');
        }

        return redirect()->route('user.signup')->with('danger', 'Unable to create user account, try again later!');
    }

    public function login()
    {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            event(new LoginUser(auth()->user()));
            
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('user.login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }
}

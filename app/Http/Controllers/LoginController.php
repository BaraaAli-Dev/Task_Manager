<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function register()
    {
        return view("register");
    }

    public function check(Request $request)
    {
        $user_info = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or Password are wrong'
        ]);
    }

    public function check_register(Request $request)
    {
        $user_info = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create($user_info);

        return redirect()->route('show')->with('success', 'Registration successful!, Please login to continue');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('show');
    }
}

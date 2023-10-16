<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Use the default guard ('web') for authentication
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/guests'); // Change this to the appropriate redirect URL after successful login
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        // Use the default guard ('web') for logout
        Auth::guard('web')->logout();
        return redirect('/');
    }
}

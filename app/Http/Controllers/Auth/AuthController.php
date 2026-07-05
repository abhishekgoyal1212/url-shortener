<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login Page
    public function index()
    {
        return view('auth.login');
    }

    // Login User
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'SuperAdmin') {
                return redirect()->route('superadmin.dashboard');
            }

            if (Auth::user()->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role == 'Member') {
                return redirect()->route('member.dashboard');
            }

            Auth::logout();

            return redirect()->route('login');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid email or password.',
            ])
            ->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

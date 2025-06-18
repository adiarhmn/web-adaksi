<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect()->intended('admin/dashboard');
                } elseif ($user->role === 'anggota') {
                    return redirect()->intended('anggota/dashboard');
                }
            } else {
                return redirect()->back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }
        }
    }
}

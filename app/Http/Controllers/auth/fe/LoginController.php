<?php

namespace App\Http\Controllers\auth\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('fe.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'katakunci' => 'required|string',
        ]);

        // Attempt login with custom guard and custom password field
        if (\Auth::guard('pelanggan')->attempt(['email' => $credentials['email'], 'katakunci' => $credentials['katakunci']])) {
            // Authenticated as pelanggan
            return redirect()->intended(route('home'))->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->withInput();
    }
}

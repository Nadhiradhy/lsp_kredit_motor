<?php

namespace App\Http\Controllers\auth\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

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

        $pelanggan = Pelanggan::where('email', $credentials['email'])->first();

        if ($pelanggan && \Hash::check($credentials['katakunci'], $pelanggan->katakunci)) {
            session(['pelanggan_id' => $pelanggan->id]);
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('pelanggan_id');
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}

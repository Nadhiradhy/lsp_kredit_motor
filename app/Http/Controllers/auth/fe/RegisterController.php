<?php

namespace App\Http\Controllers\auth\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('fe.auth.register');
    }

public function register(Request $request)
{
    $validated = $request->validate([
        'nama_pelanggan' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:pelanggan,email',
        'katakunci' => 'required|string|min:6',
        'no_telp' => 'required|string|max:15',
        'alamat1' => 'required|string|max:255',
        'kota1' => 'required|string|max:255',
        'provinsi1' => 'required|string|max:255',
        'kodepos1' => 'required|string|max:255',
        'alamat2' => 'nullable|string|max:255',
        'kota2' => 'nullable|string|max:255',
        'provinsi2' => 'nullable|string|max:255',
        'kodepos2' => 'nullable|string|max:255',
        'alamat3' => 'nullable|string|max:255',
        'kota3' => 'nullable|string|max:255',
        'provinsi3' => 'nullable|string|max:255',
        'kodepos3' => 'nullable|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Hash password
    $validated['katakunci'] = bcrypt($validated['katakunci']);
    unset($validated['katakunci']);

    // Handle foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $path = $foto->store('pelanggan', 'public');
        $validated['foto'] = $path;
    }

    \App\Models\Pelanggan::create($validated);

    // Login otomatis setelah register
    $pelanggan = \App\Models\Pelanggan::where('email', $validated['email'])->first();
    session(['pelanggan_id' => $pelanggan->id]);

    return redirect()->route('home')->with('success', 'Registrasi berhasil!');
}
}

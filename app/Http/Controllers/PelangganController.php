<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\Pelanggan::orderBy('created_at', 'desc')->get();
        return view('be.pages.pelanggan', [
            'title' => 'Pelanggan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pelanggan,email',
            'kata_kunci' => 'required|string|min:6',
            'no_telp' => 'required|string|max:15',
            'alamat1' => 'required|string|max:255',
            'kota1' => 'required|string|max:255',
            'propinsi1' => 'required|string|max:255',
            'kodepos1' => 'required|string|max:255',
            'alamat2' => 'nullable|string|max:255',
            'kota2' => 'nullable|string|max:255',
            'propinsi2' => 'nullable|string|max:255',
            'kodepos2' => 'nullable|string|max:255',
            'alamat3' => 'nullable|string|max:255',
            'kota3' => 'nullable|string|max:255',
            'propinsi3' => 'nullable|string|max:255',
            'kodepos3' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hash password sesuai standar Laravel
        $validated['kata_kunci'] = bcrypt($validated['kata_kunci']);

        // Handle upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('pelanggan', 'public');
            $validated['foto'] = $path;
        }

        \App\Models\Pelanggan::create($validated);

        return redirect()->route('be.admin.pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = \App\Models\Pelanggan::findOrFail($id);
        $data = \App\Models\Pelanggan::orderBy('created_at', 'desc')->get();
        return view('be.pages.pelanggan', [
            'title' => 'Edit Pelanggan',
            'pelanggan' => $pelanggan,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = \App\Models\Pelanggan::findOrFail($id);
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:pelanggan,email,' . $id,
            'kata_kunci' => 'nullable|string|min:6',
            'no_telp' => 'required|string|max:15',
            'alamat1' => 'required|string|max:255',
            'kota1' => 'required|string|max:255',
            'propinsi1' => 'required|string|max:255',
            'kodepos1' => 'required|string|max:255',
            'alamat2' => 'nullable|string|max:255',
            'kota2' => 'nullable|string|max:255',
            'propinsi2' => 'nullable|string|max:255',
            'kodepos2' => 'nullable|string|max:255',
            'alamat3' => 'nullable|string|max:255',
            'kota3' => 'nullable|string|max:255',
            'propinsi3' => 'nullable|string|max:255',
            'kodepos3' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika password diisi, hash dan update
        if ($request->filled('kata_kunci')) {
            $validated['kata_kunci'] = bcrypt($request->kata_kunci);
        } else {
            unset($validated['kata_kunci']);
        }

        // Handle upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('pelanggan', 'public');
            $validated['foto'] = $path;
        }

        $pelanggan->update($validated);

        return redirect()->route('be.admin.pelanggan')->with('success', 'Data pelanggan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = \App\Models\Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('be.admin.pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}

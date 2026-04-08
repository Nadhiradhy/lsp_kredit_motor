<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motors = \App\Models\Motor::with('jenisMotor')->get();
        return view('be.pages.motor.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = \App\Models\JenisMotor::all();
        return view('be.pages.motor.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_motor' => 'required|string|max:100',
            'id_jenis' => 'required|exists:jenis_motor,id',
            'harga_jual' => 'required|integer',
            'deskripsi_motor' => 'required|string',
            'warna' => 'required|string|max:50',
            'kapasitas_mesin' => 'required|string|max:10',
            'tahun_produksi' => 'required|string|max:4',
            'foto1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer',
        ]);

        // Handle file upload
        $foto1 = $request->file('foto1')->store('motor', 'public');
        $foto2 = $request->file('foto2') ? $request->file('foto2')->store('motor', 'public') : null;
        $foto3 = $request->file('foto3') ? $request->file('foto3')->store('motor', 'public') : null;

        $motor = new \App\Models\Motor();
        $motor->nama_motor = $validated['nama_motor'];
        $motor->id_jenis = $validated['id_jenis'];
        $motor->harga_jual = $validated['harga_jual'];
        $motor->deskripsi_motor = $validated['deskripsi_motor'];
        $motor->warna = $validated['warna'];
        $motor->kapasitas_mesin = $validated['kapasitas_mesin'];
        $motor->tahun_produksi = $validated['tahun_produksi'];
        $motor->foto1 = $foto1;
        $motor->foto2 = $foto2;
        $motor->foto3 = $foto3;
        $motor->stok = $validated['stok'];
        $motor->save();

        return redirect()->route('be.admin.motor')->with('success', 'Data motor berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motor = \App\Models\Motor::with('jenisMotor')->findOrFail($id);
        return view('be.pages.motor.show', compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $motor = \App\Models\Motor::findOrFail($id);
        $jenis = \App\Models\JenisMotor::all();
        return view('be.pages.motor.edit', compact('motor', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motor = \App\Models\Motor::findOrFail($id);

        $validated = $request->validate([
            'nama_motor' => 'required|string|max:100',
            'id_jenis' => 'required|exists:jenis_motor,id',
            'harga_jual' => 'required|integer',
            'deskripsi_motor' => 'required|string',
            'warna' => 'required|string|max:50',
            'kapasitas_mesin' => 'required|string|max:10',
            'tahun_produksi' => 'required|string|max:4',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer',
        ]);

        // Update file foto jika ada file baru
        if ($request->hasFile('foto1')) {
            if ($motor->foto1) \Storage::disk('public')->delete($motor->foto1);
            $motor->foto1 = $request->file('foto1')->store('motor', 'public');
        }
        if ($request->hasFile('foto2')) {
            if ($motor->foto2) \Storage::disk('public')->delete($motor->foto2);
            $motor->foto2 = $request->file('foto2')->store('motor', 'public');
        }
        if ($request->hasFile('foto3')) {
            if ($motor->foto3) \Storage::disk('public')->delete($motor->foto3);
            $motor->foto3 = $request->file('foto3')->store('motor', 'public');
        }

        // Update data lain
        $motor->nama_motor = $validated['nama_motor'];
        $motor->id_jenis = $validated['id_jenis'];
        $motor->harga_jual = $validated['harga_jual'];
        $motor->deskripsi_motor = $validated['deskripsi_motor'];
        $motor->warna = $validated['warna'];
        $motor->kapasitas_mesin = $validated['kapasitas_mesin'];
        $motor->tahun_produksi = $validated['tahun_produksi'];
        $motor->stok = $validated['stok'];
        $motor->save();

        return redirect()->route('be.admin.motor')->with('success', 'Data motor berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $motor = \App\Models\Motor::findOrFail($id);

        if ($motor->foto1) \Storage::disk('public')->delete($motor->foto1);
        if ($motor->foto2) \Storage::disk('public')->delete($motor->foto2);
        if ($motor->foto3) \Storage::disk('public')->delete($motor->foto3);

        $motor->delete();

        return redirect()->route('be.admin.motor')->with('success', 'Data motor berhasil dihapus!');
    }
}

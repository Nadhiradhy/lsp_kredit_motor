<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\JenisMotor;
use Illuminate\Support\Facades\Storage;

class JenisMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisMotor::orderBy('created_at', 'desc')->get();
        return view('be.pages.jenismotor', compact('data'));
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
        $request->validate([
            'merk' => 'required|string|max:50',
            'jenis' => 'required|string',
            'deskripsi_jenis' => 'nullable|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['merk', 'jenis', 'deskripsi_jenis']);
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $path = $image->store('jenis_motor', 'public');
            $data['image_url'] = $path;
        }
        JenisMotor::create($data);
        return redirect()->route('be.admin.jenismotor')->with('success', 'Data berhasil ditambahkan!');
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
    public function edit($id)
    {
        $jenis = JenisMotor::findOrFail($id);
        $data = JenisMotor::orderBy('created_at', 'desc')->get();
        return view('be.pages.jenismotor', compact('jenis', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = JenisMotor::findOrFail($id);
        $request->validate([
            'merk' => 'required|string|max:50',
            'jenis' => 'required|string',
            'deskripsi_jenis' => 'nullable|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['merk', 'jenis', 'deskripsi_jenis']);
        if ($request->hasFile('image_url')) {
            // Hapus gambar lama jika ada
            if ($jenis->image_url && Storage::disk('public')->exists($jenis->image_url)) {
                Storage::disk('public')->delete($jenis->image_url);
            }
            $image = $request->file('image_url');
            $path = $image->store('jenis_motor', 'public');
            $data['image_url'] = $path;
        }
        $jenis->update($data);
        return redirect()->route('be.admin.jenismotor')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis = JenisMotor::findOrFail($id);
        if ($jenis->image_url && Storage::disk('public')->exists($jenis->image_url)) {
            Storage::disk('public')->delete($jenis->image_url);
        }
        $jenis->delete();
        return redirect()->route('be.admin.jenismotor')->with('success', 'Data berhasil dihapus!');
    }
}

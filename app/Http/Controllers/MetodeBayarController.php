<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetodeBayarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\MetodeBayar::orderBy('created_at', 'desc')->get();
        return view('be.pages.metodebayar', [
            'title' => 'Metode Bayar',
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
            'metode_pembayaran' => 'required|string|max:30',
            'tempat_bayar' => 'required|string|max:50',
            'no_rekening' => 'required|string|max:25',
            'url_logo' => 'nullable|string|max:255',
            'logo_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle upload logo jika ada
        if ($request->hasFile('logo_upload')) {
            $logo = $request->file('logo_upload');
            $path = $logo->store('metodebayar', 'public');
            $validated['url_logo'] = $path;
        }

        \App\Models\MetodeBayar::create($validated);
        return redirect()->route('be.admin.metodebayar')->with('success', 'Metode bayar berhasil ditambahkan!');
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
        $metode = \App\Models\MetodeBayar::findOrFail($id);
        $data = \App\Models\MetodeBayar::orderBy('created_at', 'desc')->get();
        return view('be.pages.metodebayar', [
            'title' => 'Edit Metode Bayar',
            'metode' => $metode,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $metode = \App\Models\MetodeBayar::findOrFail($id);
        $validated = $request->validate([
            'metode_pembayaran' => 'required|string|max:30',
            'tempat_bayar' => 'required|string|max:50',
            'no_rekening' => 'required|string|max:25',
            'url_logo' => 'nullable|string|max:255',
            'logo_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo_upload')) {
            $logo = $request->file('logo_upload');
            $path = $logo->store('metodebayar', 'public');
            $validated['url_logo'] = $path;
        }

        $metode->update($validated);
        return redirect()->route('be.admin.metodebayar')->with('success', 'Metode bayar berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $metode = \App\Models\MetodeBayar::findOrFail($id);
        $metode->delete();
        return redirect()->route('be.admin.metodebayar')->with('success', 'Metode bayar berhasil dihapus!');
    }
}

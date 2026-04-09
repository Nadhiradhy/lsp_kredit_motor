<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asuransi = \App\Models\Asuransi::orderBy('created_at', 'desc')->get();
        return view('be.pages.asuransi.index', compact('asuransi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('be.pages.asuransi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan_asuransi' => 'required|string|max:30',
            'nama_asuransi' => 'required|string|max:50',
            'margin_asuransi' => 'required|numeric',
            'no_rekening' => 'required|string|max:25',
            'url_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('url_logo')) {
            $validated['url_logo'] = $request->file('url_logo')->store('asuransi', 'public');
        }

        \App\Models\Asuransi::create($validated);
        return redirect()->route('asuransi.index')->with('success', 'Data asuransi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asuransi = \App\Models\Asuransi::findOrFail($id);
        return view('be.pages.asuransi.show', compact('asuransi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asuransi = \App\Models\Asuransi::findOrFail($id);
        return view('be.pages.asuransi.edit', compact('asuransi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asuransi = \App\Models\Asuransi::findOrFail($id);
        $validated = $request->validate([
            'nama_perusahaan_asuransi' => 'required|string|max:30',
            'nama_asuransi' => 'required|string|max:50',
            'margin_asuransi' => 'required|numeric',
            'no_rekening' => 'required|string|max:25',
            'url_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('url_logo')) {
            // Hapus logo lama jika ada
            if ($asuransi->url_logo) \Storage::disk('public')->delete($asuransi->url_logo);
            $validated['url_logo'] = $request->file('url_logo')->store('asuransi', 'public');
        }

        $asuransi->update($validated);
        return redirect()->route('asuransi.index')->with('success', 'Data asuransi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asuransi = \App\Models\Asuransi::findOrFail($id);
        if ($asuransi->url_logo) {
            \Storage::disk('public')->delete($asuransi->url_logo);
        }
        $asuransi->delete();
        return redirect()->route('asuransi.index')->with('success', 'Data asuransi berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisCicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\JenisCicilan::orderBy('lama_cicilan')->get();
        return view('be.pages.jeniscicilan.index', [
            'title' => 'Jenis Cicilan',
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
            'lama_cicilan' => 'required|integer|min:1',
            'margin_kredit' => 'required|numeric|min:0',
        ]);
        \App\Models\JenisCicilan::create($validated);
        return redirect()->route('jeniscicilan.index')->with('success', 'Jenis cicilan berhasil ditambahkan!');
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
        $cicilan = \App\Models\JenisCicilan::findOrFail($id);
        $data = \App\Models\JenisCicilan::orderBy('lama_cicilan')->get();
        return view('be.pages.jeniscicilan.index', [
            'title' => 'Edit Jenis Cicilan',
            'cicilan' => $cicilan,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cicilan = \App\Models\JenisCicilan::findOrFail($id);
        $validated = $request->validate([
            'lama_cicilan' => 'required|integer|min:1',
            'margin_kredit' => 'required|numeric|min:0',
        ]);
        $cicilan->update($validated);
        return redirect()->route('jeniscicilan.index')->with('success', 'Jenis cicilan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cicilan = \App\Models\JenisCicilan::findOrFail($id);
        $cicilan->delete();
        return redirect()->route('jeniscicilan.index')->with('success', 'Jenis cicilan berhasil dihapus!');
    }
}

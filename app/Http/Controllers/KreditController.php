<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kredit;

class KreditController extends Controller
{
    public function index()
    {
        $kredit = Kredit::all();
        return view('be.pages.kredit', compact('kredit'));
    }

    public function create()
    {
        return view('be.pages.kredit-create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data kredit
        // Sesuaikan field sesuai kebutuhan
        Kredit::create($request->all());
        return redirect()->route('be.admin.kredit')->with('success', 'Data kredit berhasil ditambahkan');
    }

    public function show($id)
    {
        $kredit = Kredit::findOrFail($id);
        return view('be.pages.kredit-show', compact('kredit'));
    }
}

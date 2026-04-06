<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Motor;

class ProdukController extends Controller
{
    // Menampilkan daftar produk motor di FE
    public function index()
    {
        $motors = Motor::orderBy('created_at', 'desc')->get();
        return view('fe.motor', compact('motors'));
    }
}

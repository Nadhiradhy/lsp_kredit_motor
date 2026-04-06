<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $motors = Motor::with('jenisMotor')->orderBy('created_at', 'desc')->get();
        return view('fe.landing.catalog', compact('motors'));
    }
}

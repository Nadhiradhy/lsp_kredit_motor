<?php

namespace App\Http\Controllers;

use App\Models\PengajuanKredit;
use App\Models\Pelanggan;
use App\Models\Motor;
use App\Models\JenisCicilan;
use App\Models\Asuransi;
use Illuminate\Http\Request;

class PengajuanKreditController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanKredit::with(['pelanggan', 'motor', 'jenisCicilan', 'asuransi'])->get();
        return view('be.pages.pengajuankredit', compact('pengajuan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $motor = Motor::all();
        $jenisCicilan = JenisCicilan::all();
        $asuransi = Asuransi::all();
        return view('be.pages.pengajuankredit-create', compact('pelanggan', 'motor', 'jenisCicilan', 'asuransi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_motor' => 'required|exists:motor,id',
            'harga_cash' => 'required|integer|min:0',
            'dp' => 'required|integer|min:0',
            'id_jenis_cicilan' => 'required|exists:jenis_cicilan,id',
            'harga_kredit' => 'required|integer|min:0',
            'id_asuransi' => 'required|exists:asuransi,id',
            'biaya_asuransi' => 'required|integer|min:0',
            'cicilan_perbulan' => 'required|integer|min:0',
            'url_kk' => 'nullable|string',
            'url_ktp' => 'nullable|string',
            'url_npwp' => 'nullable|string',
            'url_slip_gaji' => 'nullable|string',
            'url_foto' => 'nullable|string',
            'status_pengajuan' => 'required|string',
            'keterangan_status_pengajuan' => 'nullable|string',
        ]);

        PengajuanKredit::create($request->all());

        return redirect()->route('be.admin.pengajuankredit')->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengajuan = PengajuanKredit::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $motor = Motor::all();
        $jenisCicilan = JenisCicilan::all();
        $asuransi = Asuransi::all();
        return view('be.pages.pengajuankredit-edit', compact('pengajuan', 'pelanggan', 'motor', 'jenisCicilan', 'asuransi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_motor' => 'required|exists:motor,id',
            'harga_cash' => 'required|integer|min:0',
            'dp' => 'required|integer|min:0',
            'id_jenis_cicilan' => 'required|exists:jenis_cicilan,id',
            'harga_kredit' => 'required|integer|min:0',
            'id_asuransi' => 'required|exists:asuransi,id',
            'biaya_asuransi' => 'required|integer|min:0',
            'cicilan_perbulan' => 'required|integer|min:0',
            'url_kk' => 'nullable|string',
            'url_ktp' => 'nullable|string',
            'url_npwp' => 'nullable|string',
            'url_slip_gaji' => 'nullable|string',
            'url_foto' => 'nullable|string',
            'status_pengajuan' => 'required|string',
            'keterangan_status_pengajuan' => 'nullable|string',
        ]);

        $pengajuan = PengajuanKredit::findOrFail($id);
        $pengajuan->update($request->all());

        return redirect()->route('be.admin.pengajuankredit')->with('success', 'Pengajuan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanKredit::findOrFail($id);
        $pengajuan->delete();
        return redirect()->route('be.admin.pengajuankredit')->with('success', 'Pengajuan berhasil dihapus.');
    }
}


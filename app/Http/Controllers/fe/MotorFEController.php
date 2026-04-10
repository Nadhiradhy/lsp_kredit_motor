<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\JenisMotor;
use App\Models\PengajuanKredit;
use App\Models\JenisCicilan;
use App\Models\Asuransi;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;

class MotorFEController extends Controller
{
    public function detail($id)
    {
        $motor = Motor::with('jenisMotor')->findOrFail($id);
        return view('fe.landing.motor-detail', compact('motor'));
    }

    public function showPengajuanForm($id)
    {
        // Cek login pelanggan
        if (!Auth::guard('pelanggan')->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengajukan kredit.');
        }
        $motor = Motor::with('jenisMotor')->findOrFail($id);
        $jenisCicilan = JenisCicilan::all();
        $asuransi = Asuransi::all();
        $pelanggan = Auth::guard('pelanggan')->user();
        return view('fe.landing.pengajuan-kredit', compact('motor', 'jenisCicilan', 'asuransi', 'pelanggan'));
    }

    public function ajukan(Request $request, $id)
    {
        if (!Auth::guard('pelanggan')->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengajukan kredit.');
        }
        $request->validate([
            'id_jenis_cicilan' => 'required|exists:jenis_cicilan,id',
            'id_asuransi' => 'required|exists:asuransi,id',
            'dp' => 'required|integer|min:0',
            'harga_kredit' => 'required|integer|min:0',
            'cicilan_perbulan' => 'required|integer|min:0',
        ]);
        $motor = Motor::findOrFail($id);
        $pelanggan = Auth::guard('pelanggan')->user();
        PengajuanKredit::create([
            'id_pelanggan' => $pelanggan->id,
            'id_motor' => $motor->id,
            'harga_cash' => $motor->harga_jual,
            'dp' => $request->dp,
            'id_jenis_cicilan' => $request->id_jenis_cicilan,
            'harga_kredit' => $request->harga_kredit,
            'id_asuransi' => $request->id_asuransi,
            'biaya_asuransi' => $request->biaya_asuransi ?? 0,
            'cicilan_perbulan' => $request->cicilan_perbulan,
            'status_pengajuan' => 'Menunggu Verifikasi',
        ]);
        return redirect()->route('catalog')->with('success', 'Pengajuan kredit berhasil dikirim!');
    }
}

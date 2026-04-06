@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Detail Angsuran</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Pelanggan:</strong> {{ $angsuran->kredit->pengajuanKredit->pelanggan->nama ?? '-' }}</p>
            <p><strong>Motor:</strong> {{ $angsuran->kredit->pengajuanKredit->motor->nama ?? '-' }}</p>
            <p><strong>Tanggal Bayar:</strong> {{ $angsuran->tanggal_bayar }}</p>
            <p><strong>Jumlah Bayar:</strong> {{ number_format($angsuran->jumlah_bayar, 0, ',', '.') }}</p>
            <p><strong>Sisa Kredit:</strong> {{ number_format($angsuran->sisa_kredit, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $angsuran->status }}</p>
        </div>
    </div>
    <a href="{{ route('angsuran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

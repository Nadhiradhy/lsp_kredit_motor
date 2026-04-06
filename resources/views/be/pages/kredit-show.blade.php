@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Detail Data Kredit</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Pelanggan:</strong> {{ $kredit->pelanggan->nama ?? '-' }}</p>
            <p><strong>Motor:</strong> {{ $kredit->motor->nama ?? '-' }}</p>
            <p><strong>Nominal Kredit:</strong> {{ number_format($kredit->nominal, 0, ',', '.') }}</p>
            <p><strong>Lama Cicilan:</strong> {{ $kredit->lama_cicilan }} bulan</p>
            <p><strong>Status:</strong> {{ $kredit->status }}</p>
        </div>
    </div>
    <a href="{{ route('be.admin.kredit') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

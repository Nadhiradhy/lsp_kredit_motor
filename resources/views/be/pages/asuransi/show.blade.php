@extends('be.master')

@section('content')
<div class="container py-4 max-w-lg">
    <h2 class="mb-4">Detail Asuransi</h2>
    <div class="bg-white p-4 rounded shadow">
        <div class="mb-3">
            <strong>Nama Perusahaan:</strong> {{ $asuransi->nama_perusahaan_asuransi }}
        </div>
        <div class="mb-3">
            <strong>Nama Asuransi:</strong> {{ $asuransi->nama_asuransi }}
        </div>
        <div class="mb-3">
            <strong>Margin Asuransi:</strong> {{ $asuransi->margin_asuransi }}
        </div>
        <div class="mb-3">
            <strong>No Rekening:</strong> {{ $asuransi->no_rekening }}
        </div>
        <div class="mb-3">
            <strong>Logo:</strong><br>
            @if($asuransi->url_logo)
                <img src="{{ asset('storage/'.$asuransi->url_logo) }}" width="100"/>
            @else
                -
            @endif
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('asuransi.edit', $asuransi->id) }}" class="btn btn-warning me-2">Edit</a>
            <a href="{{ route('asuransi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

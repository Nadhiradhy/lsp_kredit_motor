@extends('be.master')

@section('content')
<div class="container-fluid py-4">
    <h2>Detail Motor</h2>
    <div class="card">
        <div class="card-body row">
            <div class="col-md-6">
                <h4>{{ $motor->nama_motor }}</h4>
                <p><strong>Jenis:</strong> {{ $motor->jenisMotor->nama_jenis ?? '-' }}</p>
                <p><strong>Harga Jual:</strong> Rp {{ number_format($motor->harga_jual,0,',','.') }}</p>
                <p><strong>Stok:</strong> {{ $motor->stok }}</p>
                <p><strong>Tahun Produksi:</strong> {{ $motor->tahun_produksi }}</p>
                <p><strong>Warna:</strong> {{ $motor->warna }}</p>
                <p><strong>Kapasitas Mesin:</strong> {{ $motor->kapasitas_mesin }}</p>
                <p><strong>Deskripsi:</strong> {{ $motor->deskripsi_motor }}</p>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    @if($motor->foto1)
                        <img src="{{ asset('storage/'.$motor->foto1) }}" width="120" class="me-2 mb-2"/>
                    @endif
                    @if($motor->foto2)
                        <img src="{{ asset('storage/'.$motor->foto2) }}" width="120" class="me-2 mb-2"/>
                    @endif
                    @if($motor->foto3)
                        <img src="{{ asset('storage/'.$motor->foto3) }}" width="120" class="me-2 mb-2"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('be.admin.motor') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

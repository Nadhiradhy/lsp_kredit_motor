@extends('fe.master')

@section('content')
<div class="container mx-auto px-4 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <div class="md:w-1/2">
            <img src="{{ $motor->foto1 ? asset('storage/' . $motor->foto1) : 'https://via.placeholder.com/400x250?text=No+Image' }}" alt="{{ $motor->nama_motor }}" class="w-full h-64 object-cover rounded-lg mb-4">
            <div class="flex gap-2">
                @if($motor->foto2)
                    <img src="{{ asset('storage/' . $motor->foto2) }}" class="w-20 h-14 object-cover rounded">
                @endif
                @if($motor->foto3)
                    <img src="{{ asset('storage/' . $motor->foto3) }}" class="w-20 h-14 object-cover rounded">
                @endif
            </div>
        </div>
        <div class="md:w-1/2">
            <h2 class="text-2xl font-bold mb-2">{{ $motor->nama_motor }}</h2>
            <div class="text-slate-400 mb-2">{{ $motor->jenisMotor->jenis ?? '-' }}</div>
            <div class="text-blue-400 font-semibold mb-2">Rp {{ number_format($motor->harga_jual, 0, ',', '.') }}</div>
            <div class="text-xs text-slate-400 mb-2">Stok: {{ $motor->stok }}</div>
            <div class="mb-2">Warna: {{ $motor->warna }}</div>
            <div class="mb-2">Kapasitas Mesin: {{ $motor->kapasitas_mesin }}</div>
            <div class="mb-2">Tahun Produksi: {{ $motor->tahun_produksi }}</div>
            <p class="mb-4">{{ $motor->deskripsi_motor }}</p>
            <a href="{{ route('fe.pengajuan.create', $motor->id) }}" class="bg-red-500 text-white px-6 py-2 rounded-full font-medium hover:bg-red-600 transition">Ajukan Kredit</a>
        </div>
    </div>
</div>
@endsection

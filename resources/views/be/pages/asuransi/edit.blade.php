@extends('be.master')

@section('content')
<div class="container py-4 max-w-lg">
    <h2 class="mb-4">Edit Asuransi</h2>
    <form action="{{ route('asuransi.update', $asuransi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Perusahaan Asuransi</label>
            <input type="text" name="nama_perusahaan_asuransi" class="form-control" required value="{{ old('nama_perusahaan_asuransi', $asuransi->nama_perusahaan_asuransi) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Asuransi</label>
            <input type="text" name="nama_asuransi" class="form-control" required value="{{ old('nama_asuransi', $asuransi->nama_asuransi) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Margin Asuransi</label>
            <input type="number" step="0.01" name="margin_asuransi" class="form-control" required value="{{ old('margin_asuransi', $asuransi->margin_asuransi) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">No Rekening</label>
            <input type="text" name="no_rekening" class="form-control" required value="{{ old('no_rekening', $asuransi->no_rekening) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Logo (opsional)</label>
            <input type="file" name="url_logo" class="form-control">
            @if($asuransi->url_logo)
                <img src="{{ asset('storage/'.$asuransi->url_logo) }}" width="80" class="mt-2"/>
            @endif
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('asuransi.index') }}" class="btn btn-secondary ms-2">Kembali</a>
        </div>
    </form>
</div>
@endsection

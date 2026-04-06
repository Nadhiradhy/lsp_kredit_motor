@extends('be.master')

@section('content')
<div class="container-fluid py-4">
    <h2>Edit Motor</h2>
    <form action="{{ route('be.admin.motor.update', $motor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama Motor</label>
                    <input type="text" name="nama_motor" class="form-control" value="{{ $motor->nama_motor }}" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Motor</label>
                    <select name="id_jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        @foreach($jenis as $j)
                        <option value="{{ $j->id }}" @if($motor->id_jenis == $j->id) selected @endif>{{ $j->merk }} - {{ $j->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" value="{{ $motor->harga_jual }}" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $motor->stok }}" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Produksi</label>
                    <input type="text" name="tahun_produksi" class="form-control" maxlength="4" value="{{ $motor->tahun_produksi }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Warna</label>
                    <input type="text" name="warna" class="form-control" value="{{ $motor->warna }}" required>
                </div>
                <div class="mb-3">
                    <label>Kapasitas Mesin</label>
                    <input type="text" name="kapasitas_mesin" class="form-control" value="{{ $motor->kapasitas_mesin }}" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi Motor</label>
                    <textarea name="deskripsi_motor" class="form-control" rows="3" required>{{ $motor->deskripsi_motor }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Foto 1</label>
                    <input type="file" name="foto1" class="form-control">
                    @if($motor->foto1)
                        <img src="{{ asset('storage/'.$motor->foto1) }}" width="80" class="mt-2"/>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Foto 2</label>
                    <input type="file" name="foto2" class="form-control">
                    @if($motor->foto2)
                        <img src="{{ asset('storage/'.$motor->foto2) }}" width="80" class="mt-2"/>
                    @endif
                </div>
                <div class="mb-3">
                    <label>Foto 3</label>
                    <input type="file" name="foto3" class="form-control">
                    @if($motor->foto3)
                        <img src="{{ asset('storage/'.$motor->foto3) }}" width="80" class="mt-2"/>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('be.admin.motor') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

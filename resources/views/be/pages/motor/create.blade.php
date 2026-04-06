@extends('be.master')

@section('content')
<div class="container-fluid py-4">
    <h2>Tambah Motor</h2>
    <form action="{{ route('be.admin.motor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama Motor</label>
                    <input type="text" name="nama_motor" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Motor</label>
                    <select name="id_jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        @foreach($jenis as $j)
                        <option value="{{ $j->id }}">{{ $j->merk }} - {{ $j->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Produksi</label>
                    <input type="text" name="tahun_produksi" class="form-control" maxlength="4" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Warna</label>
                    <input type="text" name="warna" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kapasitas Mesin</label>
                    <input type="text" name="kapasitas_mesin" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi Motor</label>
                    <textarea name="deskripsi_motor" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Foto 1</label>
                    <input type="file" name="foto1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Foto 2</label>
                    <input type="file" name="foto2" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Foto 3</label>
                    <input type="file" name="foto3" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('be.admin.motor') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

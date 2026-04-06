@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Tambah Data Kredit</h1>
    <form action="{{ route('be.admin.kredit.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_motor" class="form-label">Motor</label>
            <input type="text" name="id_motor" id="id_motor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal Kredit</label>
            <input type="number" name="nominal" id="nominal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lama_cicilan" class="form-label">Lama Cicilan (bulan)</label>
            <input type="number" name="lama_cicilan" id="lama_cicilan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="aktif">Aktif</option>
                <option value="lunas">Lunas</option>
                <option value="menunggak">Menunggak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('be.admin.kredit') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

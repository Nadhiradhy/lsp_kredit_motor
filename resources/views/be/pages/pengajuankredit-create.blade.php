@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Tambah Pengajuan Kredit</h1>
    <form action="{{ route('be.admin.pengajuankredit.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_motor" class="form-label">Motor</label>
            <select name="id_motor" id="id_motor" class="form-control" required>
                <option value="">Pilih Motor</option>
                @foreach($motor as $m)
                    <option value="{{ $m->id }}">{{ $m->nama_motor }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga_cash" class="form-label">Harga Cash</label>
            <input type="number" name="harga_cash" id="harga_cash" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dp" class="form-label">DP</label>
            <input type="number" name="dp" id="dp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_jenis_cicilan" class="form-label">Jenis Cicilan</label>
            <select name="id_jenis_cicilan" id="id_jenis_cicilan" class="form-control" required>
                <option value="">Pilih Jenis Cicilan</option>
                @foreach($jenisCicilan as $jc)
                    <option value="{{ $jc->id }}">{{ $jc->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga_kredit" class="form-label">Harga Kredit</label>
            <input type="number" name="harga_kredit" id="harga_kredit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="id_asuransi" class="form-label">Asuransi</label>
            <select name="id_asuransi" id="id_asuransi" class="form-control" required>
                <option value="">Pilih Asuransi</option>
                @foreach($asuransi as $a)
                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="biaya_asuransi" class="form-label">Biaya Asuransi</label>
            <input type="number" name="biaya_asuransi" id="biaya_asuransi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cicilan_perbulan" class="form-label">Cicilan Perbulan</label>
            <input type="number" name="cicilan_perbulan" id="cicilan_perbulan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('be.admin.pengajuankredit') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

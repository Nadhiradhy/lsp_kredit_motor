@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Edit Pengajuan Kredit</h1>
    <form action="{{ route('be.admin.pengajuankredit.update', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id }}" {{ $pengajuan->id_pelanggan == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_motor" class="form-label">Motor</label>
            <select name="id_motor" id="id_motor" class="form-control" required>
                <option value="">Pilih Motor</option>
                @foreach($motor as $m)
                    <option value="{{ $m->id }}" {{ $pengajuan->id_motor == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga_cash" class="form-label">Harga Cash</label>
            <input type="number" name="harga_cash" id="harga_cash" class="form-control" value="{{ $pengajuan->harga_cash }}" required>
        </div>
        <div class="mb-3">
            <label for="dp" class="form-label">DP</label>
            <input type="number" name="dp" id="dp" class="form-control" value="{{ $pengajuan->dp }}" required>
        </div>
        <div class="mb-3">
            <label for="id_jenis_cicilan" class="form-label">Jenis Cicilan</label>
            <select name="id_jenis_cicilan" id="id_jenis_cicilan" class="form-control" required>
                <option value="">Pilih Jenis Cicilan</option>
                @foreach($jenisCicilan as $jc)
                    <option value="{{ $jc->id }}" {{ $pengajuan->id_jenis_cicilan == $jc->id ? 'selected' : '' }}>{{ $jc->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga_kredit" class="form-label">Harga Kredit</label>
            <input type="number" name="harga_kredit" id="harga_kredit" class="form-control" value="{{ $pengajuan->harga_kredit }}" required>
        </div>
        <div class="mb-3">
            <label for="id_asuransi" class="form-label">Asuransi</label>
            <select name="id_asuransi" id="id_asuransi" class="form-control" required>
                <option value="">Pilih Asuransi</option>
                @foreach($asuransi as $a)
                    <option value="{{ $a->id }}" {{ $pengajuan->id_asuransi == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="biaya_asuransi" class="form-label">Biaya Asuransi</label>
            <input type="number" name="biaya_asuransi" id="biaya_asuransi" class="form-control" value="{{ $pengajuan->biaya_asuransi }}" required>
        </div>
        <div class="mb-3">
            <label for="cicilan_perbulan" class="form-label">Cicilan Perbulan</label>
            <input type="number" name="cicilan_perbulan" id="cicilan_perbulan" class="form-control" value="{{ $pengajuan->cicilan_perbulan }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('be.admin.pengajuankredit') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

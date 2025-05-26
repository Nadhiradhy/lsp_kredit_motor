@extends('be.layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pengajuan Kredit</h2>
    <form action="{{ route('be.admin.pengajuankredit.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="id_pelanggan">Pelanggan</label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror" required>
                        <option value="">Pilih Pelanggan</option>
                        @foreach($pelanggan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_pelanggan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="id_motor">Motor</label>
                    <select name="id_motor" id="id_motor" class="form-control @error('id_motor') is-invalid @enderror" required>
                        <option value="">Pilih Motor</option>
                        @foreach($motor as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_motor }}</option>
                        @endforeach
                    </select>
                    @error('id_motor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="harga_cash">Harga Cash</label>
                    <input type="number" name="harga_cash" id="harga_cash" class="form-control @error('harga_cash') is-invalid @enderror" required>
                    @error('harga_cash')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="dp">DP</label>
                    <input type="number" name="dp" id="dp" class="form-control @error('dp') is-invalid @enderror" required>
                    @error('dp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="id_jenis_cicilan">Jenis Cicilan</label>
                    <select name="id_jenis_cicilan" id="id_jenis_cicilan" class="form-control @error('id_jenis_cicilan') is-invalid @enderror" required>
                        <option value="">Pilih Jenis Cicilan</option>
                        @foreach($jenisCicilan as $jc)
                            <option value="{{ $jc->id }}">{{ $jc->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_jenis_cicilan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="harga_kredit">Harga Kredit</label>
                    <input type="number" name="harga_kredit" id="harga_kredit" class="form-control @error('harga_kredit') is-invalid @enderror" required>
                    @error('harga_kredit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="id_asuransi">Asuransi</label>
                    <select name="id_asuransi" id="id_asuransi" class="form-control @error('id_asuransi') is-invalid @enderror" required>
                        <option value="">Pilih Asuransi</option>
                        @foreach($asuransi as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_asuransi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="biaya_asuransi">Biaya Asuransi</label>
                    <input type="number" name="biaya_asuransi" id="biaya_asuransi" class="form-control @error('biaya_asuransi') is-invalid @enderror" required>
                    @error('biaya_asuransi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="cicilan_perbulan">Cicilan per Bulan</label>
                    <input type="number" name="cicilan_perbulan" id="cicilan_perbulan" class="form-control @error('cicilan_perbulan') is-invalid @enderror" required>
                    @error('cicilan_perbulan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="status_pengajuan">Status Pengajuan</label>
                    <select name="status_pengajuan" id="status_pengajuan" class="form-control @error('status_pengajuan') is-invalid @enderror" required>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                    @error('status_pengajuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="keterangan_status_pengajuan">Keterangan Status</label>
                    <textarea name="keterangan_status_pengajuan" id="keterangan_status_pengajuan" class="form-control @error('keterangan_status_pengajuan') is-invalid @enderror" rows="3"></textarea>
                    @error('keterangan_status_pengajuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('be.admin.pengajuankredit') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection 
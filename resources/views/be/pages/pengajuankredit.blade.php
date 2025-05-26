@extends('be.layouts.app') {{-- Ganti dengan layout Anda jika berbeda --}}

@section('content')
<div class="container">
    <h2>Data Pengajuan Kredit</h2>
    <a href="{{ route('be.admin.pengajuankredit.create') }}" class="btn btn-primary mb-3">Tambah Pengajuan</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-white">
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Motor</th>
                    <th>Harga Cash</th>
                    <th>DP</th>
                    <th>Jenis Cicilan</th>
                    <th>Harga Kredit</th>
                    <th>Asuransi</th>
                    <th>Biaya Asuransi</th>
                    <th>Cicilan/Bulan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $item->motor->nama_motor ?? '-' }}</td>
                    <td>Rp {{ number_format($item->harga_cash, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->dp, 0, ',', '.') }}</td>
                    <td>{{ $item->jenisCicilan->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($item->harga_kredit, 0, ',', '.') }}</td>
                    <td>{{ $item->asuransi->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($item->biaya_asuransi, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->cicilan_perbulan, 0, ',', '.') }}</td>
                    <td>{{ $item->status_pengajuan }}</td>
                    <td>{{ $item->keterangan_status_pengajuan }}</td>
                    <td>
                        <a href="{{ route('be.admin.pengajuankredit.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('be.admin.pengajuankredit.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

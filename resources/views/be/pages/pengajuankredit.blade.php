@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Daftar Pengajuan Kredit</h1>
    <a href="{{ route('be.admin.pengajuankredit.create') }}" class="btn btn-primary mb-3">Tambah Pengajuan Kredit</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Motor</th>
                    <th>Jenis Cicilan</th>
                    <th>Asuransi</th>
                    <th>Harga Cash</th>
                    <th>DP</th>
                    <th>Harga Kredit</th>
                    <th>Biaya Asuransi</th>
                    <th>Cicilan Perbulan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $item->motor->nama ?? '-' }}</td>
                    <td>{{ $item->jenisCicilan->nama ?? '-' }}</td>
                    <td>{{ $item->asuransi->nama ?? '-' }}</td>
                    <td>{{ number_format($item->harga_cash, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->dp, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->harga_kredit, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->biaya_asuransi, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->cicilan_perbulan, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('be.admin.pengajuankredit.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('be.admin.pengajuankredit.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

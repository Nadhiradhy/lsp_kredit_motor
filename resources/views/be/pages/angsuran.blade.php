@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Daftar Riwayat Angsuran</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Motor</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Sisa Kredit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($angsuran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kredit->pengajuanKredit->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $item->kredit->pengajuanKredit->motor->nama ?? '-' }}</td>
                    <td>{{ $item->tanggal_bayar }}</td>
                    <td>{{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->sisa_kredit, 0, ',', '.') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('angsuran.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

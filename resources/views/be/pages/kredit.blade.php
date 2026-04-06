@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Daftar Data Kredit</h1>
    <a href="{{ route('be.admin.kredit.create') }}" class="btn btn-primary mb-3">Tambah Kredit</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Motor</th>
                    <th>Nominal Kredit</th>
                    <th>Lama Cicilan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kredit as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                    <td>{{ $item->motor->nama ?? '-' }}</td>
                    <td>{{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td>{{ $item->lama_cicilan }} bulan</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('be.admin.kredit.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

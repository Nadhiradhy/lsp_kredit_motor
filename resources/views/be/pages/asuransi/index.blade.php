@extends('be.master')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Asuransi Management</h2>
        <a href="{{ route('asuransi.create') }}" class="btn btn-primary">Tambah Asuransi</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Perusahaan</th>
                <th>Nama Asuransi</th>
                <th>Margin</th>
                <th>No Rekening</th>
                <th>Logo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asuransi as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->nama_perusahaan_asuransi }}</td>
                <td>{{ $a->nama_asuransi }}</td>
                <td>{{ $a->margin_asuransi }}</td>
                <td>{{ $a->no_rekening }}</td>
                <td>
                    @if($a->url_logo)
                        <img src="{{ asset('storage/'.$a->url_logo) }}" width="60"/>
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('asuransi.show', $a->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('asuransi.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('asuransi.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

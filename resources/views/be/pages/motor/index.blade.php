@extends('be.master')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Data Motor</h2>
        <a href="{{ route('be.admin.motor.create') }}" class="btn btn-primary">Tambah Motor</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Motor</th>
                        <th>Jenis</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Tahun</th>
                        <th>Warna</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motors as $motor)
                    <tr>
                        <td>{{ $motor->id }}</td>
                        <td>{{ $motor->nama_motor }}</td>
                        <td>{{ $motor->jenisMotor->nama_jenis ?? '-' }}</td>
                        <td>Rp {{ number_format($motor->harga_jual,0,',','.') }}</td>
                        <td>{{ $motor->stok }}</td>
                        <td>{{ $motor->tahun_produksi }}</td>
                        <td>{{ $motor->warna }}</td>
                        <td>
                            @if($motor->foto1)
                                <img src="{{ asset('storage/'.$motor->foto1) }}" width="60"/>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('be.admin.motor.show', $motor->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('be.admin.motor.edit', $motor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('be.admin.motor.destroy', $motor->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('be.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">@if(isset($jenis)) Edit Jenis Motor @else Form Jenis Motor @endif</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="@if(isset($jenis)){{ route('be.admin.jenismotor.update', $jenis->id) }}@else{{ route('be.admin.jenismotor.store') }}@endif" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($jenis))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk', $jenis->merk ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-select" id="jenis" name="jenis" required>
                                <option value="">-- Pilih Jenis --</option>
                                @php
                                    $jenisList = ['Bebek','Skuter','Dual Sport','Naked Sport','Sport Bike','Retro','Cruiser','Sport Touring','Dirt Bike','Motocross','Scrambler','ATV','Motor Adventure','Lainnya'];
                                @endphp
                                @foreach($jenisList as $j)
                                    <option value="{{ $j }}" @if(old('jenis', $jenis->jenis ?? '') == $j) selected @endif>{{ $j }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_jenis" class="form-label">Deskripsi Jenis</label>
                            <input type="text" class="form-control" id="deskripsi_jenis" name="deskripsi_jenis" value="{{ old('deskripsi_jenis', $jenis->deskripsi_jenis ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar Jenis Motor</label>
                            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
                            @if(isset($jenis) && $jenis->image_url)
                                <img src="{{ asset('storage/'.$jenis->image_url) }}" alt="Gambar" class="img-thumbnail mt-2" width="120">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">@if(isset($jenis)) Update @else Simpan @endif</button>
                        @if(isset($jenis))
                            <a href="{{ route('be.admin.jenismotor') }}" class="btn btn-secondary ms-2">Batal</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Data Jenis Motor</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Merk</th>
                                <th>Jenis</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->merk }}</td>
                                    <td>{{ $row->jenis }}</td>
                                    <td>{{ $row->deskripsi_jenis }}</td>
                                    <td>
                                        @if($row->image_url)
                                            <img src="{{ asset('storage/'.$row->image_url) }}" alt="Gambar" width="60">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('be.admin.jenismotor.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('be.admin.jenismotor.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

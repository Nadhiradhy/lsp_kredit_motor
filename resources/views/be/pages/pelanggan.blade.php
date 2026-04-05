@extends('be.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">@if(isset($pelanggan)) Edit Pelanggan @else Form Pelanggan @endif</h4>
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
                    <form action="@if(isset($pelanggan)){{ route('be.admin.pelanggan.update', $pelanggan->id) }}@else{{ route('be.admin.pelanggan.store') }}@endif" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($pelanggan))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pelanggan->email ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp', $pelanggan->no_telp ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kata_kunci" class="form-label">Password</label>
                            <input type="password" class="form-control" id="kata_kunci" name="kata_kunci" @if(!isset($pelanggan)) required @endif>
                            @if(isset($pelanggan))<small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>@endif
                        </div>
                        <div class="mb-3">
                            <label for="alamat1" class="form-label">Alamat 1</label>
                            <input type="text" class="form-control" id="alamat1" name="alamat1" value="{{ old('alamat1', $pelanggan->alamat1 ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota1" class="form-label">Kota 1</label>
                            <input type="text" class="form-control" id="kota1" name="kota1" value="{{ old('kota1', $pelanggan->kota1 ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="propinsi1" class="form-label">Provinsi 1</label>
                            <input type="text" class="form-control" id="propinsi1" name="propinsi1" value="{{ old('propinsi1', $pelanggan->propinsi1 ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kodepos1" class="form-label">Kode Pos 1</label>
                            <input type="text" class="form-control" id="kodepos1" name="kodepos1" value="{{ old('kodepos1', $pelanggan->kodepos1 ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat2" class="form-label">Alamat 2</label>
                            <input type="text" class="form-control" id="alamat2" name="alamat2" value="{{ old('alamat2', $pelanggan->alamat2 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="kota2" class="form-label">Kota 2</label>
                            <input type="text" class="form-control" id="kota2" name="kota2" value="{{ old('kota2', $pelanggan->kota2 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="propinsi2" class="form-label">Provinsi 2</label>
                            <input type="text" class="form-control" id="propinsi2" name="propinsi2" value="{{ old('propinsi2', $pelanggan->propinsi2 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="kodepos2" class="form-label">Kode Pos 2</label>
                            <input type="text" class="form-control" id="kodepos2" name="kodepos2" value="{{ old('kodepos2', $pelanggan->kodepos2 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat3" class="form-label">Alamat 3</label>
                            <input type="text" class="form-control" id="alamat3" name="alamat3" value="{{ old('alamat3', $pelanggan->alamat3 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="kota3" class="form-label">Kota 3</label>
                            <input type="text" class="form-control" id="kota3" name="kota3" value="{{ old('kota3', $pelanggan->kota3 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="propinsi3" class="form-label">Provinsi 3</label>
                            <input type="text" class="form-control" id="propinsi3" name="propinsi3" value="{{ old('propinsi3', $pelanggan->propinsi3 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="kodepos3" class="form-label">Kode Pos 3</label>
                            <input type="text" class="form-control" id="kodepos3" name="kodepos3" value="{{ old('kodepos3', $pelanggan->kodepos3 ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if(isset($pelanggan) && $pelanggan->foto)
                                <img src="{{ asset('storage/'.$pelanggan->foto) }}" alt="Foto" class="img-thumbnail mt-2" width="120">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">@if(isset($pelanggan)) Update @else Simpan @endif</button>
                        @if(isset($pelanggan))
                            <a href="{{ route('be.admin.pelanggan') }}" class="btn btn-secondary ms-2">Batal</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Data Pelanggan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Alamat 1</th>
                                <th>Foto</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_pelanggan }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->no_telp }}</td>
                                    <td>{{ $row->alamat1 }}</td>
                                    <td>
                                        @if($row->foto)
                                            <img src="{{ asset('storage/'.$row->foto) }}" alt="Foto" width="60">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('be.admin.pelanggan', ['detail' => $row->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                    @if(request('detail'))
                                        @php
                                            $detail = $data->where('id', request('detail'))->first();
                                        @endphp
                                        @if($detail)
                                        <div class="card mt-4">
                                            <div class="card-header bg-info text-white">
                                                <h5 class="mb-0">Detail Data Pelanggan</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 text-center mb-3">
                                                        @if($detail->foto)
                                                            <img src="{{ asset('storage/'.$detail->foto) }}" alt="Foto" class="img-thumbnail" width="120">
                                                        @else
                                                            <span class="text-muted">Tidak ada foto</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <table class="table table-sm table-borderless">
                                                            <tr><th>Nama</th><td>: {{ $detail->nama_pelanggan }}</td></tr>
                                                            <tr><th>Email</th><td>: {{ $detail->email }}</td></tr>
                                                            <tr><th>No. Telepon</th><td>: {{ $detail->no_telp }}</td></tr>
                                                            <tr><th>Alamat 1</th><td>: {{ $detail->alamat1 }}</td></tr>
                                                            <tr><th>Kota 1</th><td>: {{ $detail->kota1 }}</td></tr>
                                                            <tr><th>Provinsi 1</th><td>: {{ $detail->propinsi1 }}</td></tr>
                                                            <tr><th>Kode Pos 1</th><td>: {{ $detail->kodepos1 }}</td></tr>
                                                            <tr><th>Alamat 2</th><td>: {{ $detail->alamat2 }}</td></tr>
                                                            <tr><th>Kota 2</th><td>: {{ $detail->kota2 }}</td></tr>
                                                            <tr><th>Provinsi 2</th><td>: {{ $detail->propinsi2 }}</td></tr>
                                                            <tr><th>Kode Pos 2</th><td>: {{ $detail->kodepos2 }}</td></tr>
                                                            <tr><th>Alamat 3</th><td>: {{ $detail->alamat3 }}</td></tr>
                                                            <tr><th>Kota 3</th><td>: {{ $detail->kota3 }}</td></tr>
                                                            <tr><th>Provinsi 3</th><td>: {{ $detail->propinsi3 }}</td></tr>
                                                            <tr><th>Kode Pos 3</th><td>: {{ $detail->kodepos3 }}</td></tr>
                                                            <tr><th>Tanggal Input</th><td>: {{ $detail->created_at }}</td></tr>
                                                            <tr><th>Tanggal Update</th><td>: {{ $detail->updated_at }}</td></tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    <td>
                                        <a href="{{ route('be.admin.pelanggan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('be.admin.pelanggan.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada data</td>
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

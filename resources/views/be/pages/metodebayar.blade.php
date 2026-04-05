@extends('be.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">@if(isset($metode)) Edit Metode Bayar @else Form Metode Bayar @endif</h4>
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
                    <form action="@if(isset($metode)){{ route('be.admin.metodebayar.update', $metode->id) }}@else{{ route('be.admin.metodebayar.store') }}@endif" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($metode))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" value="{{ old('metode_pembayaran', $metode->metode_pembayaran ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_bayar" class="form-label">Tempat Bayar</label>
                            <input type="text" class="form-control" id="tempat_bayar" name="tempat_bayar" value="{{ old('tempat_bayar', $metode->tempat_bayar ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_rekening" class="form-label">No. Rekening</label>
                            <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="{{ old('no_rekening', $metode->no_rekening ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="url_logo" class="form-label">Logo (URL atau Upload)</label>
                            <input type="text" class="form-control mb-2" id="url_logo" name="url_logo" value="{{ old('url_logo', $metode->url_logo ?? '') }}" placeholder="URL logo, atau upload di bawah">
                            <input type="file" class="form-control" id="logo_upload" name="logo_upload" accept="image/*">
                            @if(isset($metode) && $metode->url_logo)
                                <img src="{{ asset('storage/'.$metode->url_logo) }}" alt="Logo" class="img-thumbnail mt-2" width="120">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">@if(isset($metode)) Update @else Simpan @endif</button>
                        @if(isset($metode))
                            <a href="{{ route('be.admin.metodebayar') }}" class="btn btn-secondary ms-2">Batal</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Data Metode Bayar</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Metode</th>
                                <th>Tempat</th>
                                <th>No. Rekening</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->metode_pembayaran }}</td>
                                    <td>{{ $row->tempat_bayar }}</td>
                                    <td>{{ $row->no_rekening }}</td>
                                    <td>
                                        @if($row->url_logo)
                                            <img src="{{ asset('storage/'.$row->url_logo) }}" alt="Logo" width="60">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @php $isActive = $row->status ?? true; @endphp
                                        @if($isActive)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('be.admin.metodebayar', ['detail' => $row->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('be.admin.metodebayar.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('be.admin.metodebayar.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @if(request('detail'))
                                @php
                                    $detail = $data->where('id', request('detail'))->first();
                                @endphp
                                @if($detail)
                                <div class="card mt-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">Detail Metode Bayar</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 text-center mb-3">
                                                @if($detail->url_logo)
                                                    <img src="{{ asset('storage/'.$detail->url_logo) }}" alt="Logo" class="img-thumbnail" width="120">
                                                @else
                                                    <span class="text-muted">Tidak ada logo</span>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-sm table-borderless">
                                                    <tr><th>Metode</th><td>: {{ $detail->metode_pembayaran }}</td></tr>
                                                    <tr><th>Tempat Bayar</th><td>: {{ $detail->tempat_bayar }}</td></tr>
                                                    <tr><th>No. Rekening</th><td>: {{ $detail->no_rekening }}</td></tr>
                                                    <tr><th>Status</th><td>: @php $isActive = $detail->status ?? true; @endphp @if($isActive) <span class="badge bg-success">Aktif</span> @else <span class="badge bg-secondary">Nonaktif</span> @endif</td></tr>
                                                    <tr><th>Tanggal Input</th><td>: {{ $detail->created_at }}</td></tr>
                                                    <tr><th>Tanggal Update</th><td>: {{ $detail->updated_at }}</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
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

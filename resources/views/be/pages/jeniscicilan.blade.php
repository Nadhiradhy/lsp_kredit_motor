@extends('be.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">@if(isset($cicilan)) Edit Jenis Cicilan @else Form Jenis Cicilan @endif</h4>
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
                    <form action="@if(isset($cicilan)){{ route('be.admin.jeniscicilan.update', $cicilan->id) }}@else{{ route('be.admin.jeniscicilan.store') }}@endif" method="POST">
                        @csrf
                        @if(isset($cicilan))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="lama_cicilan" class="form-label">Lama Cicilan (bulan)</label>
                            <input type="number" class="form-control" id="lama_cicilan" name="lama_cicilan" value="{{ old('lama_cicilan', $cicilan->lama_cicilan ?? '') }}" required min="1">
                        </div>
                        <div class="mb-3">
                            <label for="margin_kredit" class="form-label">Margin Kredit (%)</label>
                            <input type="number" step="0.01" class="form-control" id="margin_kredit" name="margin_kredit" value="{{ old('margin_kredit', $cicilan->margin_kredit ?? '') }}" required min="0">
                        </div>
                        <button type="submit" class="btn btn-success">@if(isset($cicilan)) Update @else Simpan @endif</button>
                        @if(isset($cicilan))
                            <a href="{{ route('be.admin.jeniscicilan') }}" class="btn btn-secondary ms-2">Batal</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Data Jenis Cicilan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Lama Cicilan (bulan)</th>
                                <th>Margin Kredit (%)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->lama_cicilan }}</td>
                                    <td>{{ $row->margin_kredit }}</td>
                                    <td>
                                        <a href="{{ route('be.admin.jeniscicilan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('be.admin.jeniscicilan.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data</td>
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

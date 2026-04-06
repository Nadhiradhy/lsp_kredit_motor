@extends('be.master')

@section('content')
<div class="container mt-4">
    <h1>Jenis Cicilan</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">@if(isset($cicilan)) Edit Jenis Cicilan @else Tambah Jenis Cicilan @endif</h4>
                </div>
                <div class="card-body">
                    <form action="@if(isset($cicilan)){{ route('jeniscicilan.update', $cicilan->id) }}@else{{ route('jeniscicilan.store') }}@endif" method="POST">
                        @csrf
                        @if(isset($cicilan))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="lama_cicilan" class="form-label">Lama Cicilan (bulan)</label>
                            <input type="number" name="lama_cicilan" id="lama_cicilan" class="form-control" value="{{ old('lama_cicilan', $cicilan->lama_cicilan ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="margin_kredit" class="form-label">Margin Kredit (%)</label>
                            <input type="number" step="0.01" name="margin_kredit" id="margin_kredit" class="form-control" value="{{ old('margin_kredit', $cicilan->margin_kredit ?? '') }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">@if(isset($cicilan)) Update @else Simpan @endif</button>
                        @if(isset($cicilan))
                            <a href="{{ route('jeniscicilan.index') }}" class="btn btn-secondary ms-2">Batal</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
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
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->lama_cicilan }}</td>
                                <td>{{ $item->margin_kredit }}</td>
                                <td>
                                    <a href="{{ route('jeniscicilan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('jeniscicilan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
        </div>
    </div>
</div>
@endsection

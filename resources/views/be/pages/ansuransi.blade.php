@extends('layouts.app') {{-- Ganti dengan layout yang Anda gunakan --}}

@section('content')
<div class="container">
    <h2>Data Asuransi</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Perusahaan Asuransi</th>
                    <th>Nama Asuransi</th>
                    <th>Margin Asuransi</th>
                    <th>No Rekening</th>
                    <th>URL Logo</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($asuransi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_perusahaan_asuransi }}</td>
                    <td>{{ $item->nama_asuransi }}</td>
                    <td>{{ $item->margin_asuransi }}</td>
                    <td>{{ $item->no_rekening }}</td>
                    <td>
                        @if($item->url_logo)
                            <img src="{{ asset($item->url_logo) }}" alt="Logo" style="max-width: 50px;">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</div>
@endsection

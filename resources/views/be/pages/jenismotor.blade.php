@extends('be.layouts.app') {{-- Ganti dengan layout Anda jika berbeda --}}

@section('content')
<div class="container">
    <h2>Data Jenis Motor</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-white">
                <tr>
                    <th>ID</th>
                    <th>Merk</th>
                    <th>Jenis</th>
                    <th>Deskripsi Jenis</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($jenisMotors as $motor)
                <tr>
                    <td>{{ $motor->id }}</td>
                    <td>{{ $motor->merk }}</td>
                    <td>{{ $motor->jenis }}</td>
                    <td>{{ $motor->deskripsi_jenis }}</td>
                    <td>
                        @if($motor->image_url)
                            <img src="{{ asset($motor->image_url) }}" alt="Image" style="max-width: 80px; max-height: 80px;">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $motor->created_at }}</td>
                    <td>{{ $motor->updated_at }}</td>
                </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</div>
@endsection

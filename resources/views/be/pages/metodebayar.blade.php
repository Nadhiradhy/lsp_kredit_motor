@extends('be.layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Data Metode Pembayaran</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Metode Pembayaran</th>
                            <th>Tempat Bayar</th>
                            <th>No Rekening</th>
                            <th>Logo</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @forelse($metodebayar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->metode_pembayaran }}</td>
                            <td>{{ $item->tempat_bayar }}</td>
                            <td>{{ $item->no_rekening }}</td>
                            <td>
                                @if($item->url_logo)
                                    <img src="{{ asset($item->url_logo) }}" alt="Logo" style="height:40px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data metode pembayaran.</td>
                        </tr>
                        @endforelse
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

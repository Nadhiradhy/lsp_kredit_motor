@extends('be.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Pelanggan</h1>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kata Kunci</th>
                            <th>No Telp</th>
                            <th>Alamat 1</th>
                            <th>Kota 1</th>
                            <th>Propinsi 1</th>
                            <th>Kodepos 1</th>
                            <th>Alamat 2</th>
                            <th>Kota 2</th>
                            <th>Propinsi 2</th>
                            <th>Kodepos 2</th>
                            <th>Alamat 3</th>
                            <th>Kota 3</th>
                            <th>Propinsi 3</th>
                            <th>Kodepos 3</th>
                            <th>Foto</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach($pelanggans as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nama_pelanggan }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->katakunci }}</td>
                            <td>{{ $p->no_telp }}</td>
                            <td>{{ $p->alamat1 }}</td>
                            <td>{{ $p->kota1 }}</td>
                            <td>{{ $p->propinsi1 }}</td>
                            <td>{{ $p->kodepos1 }}</td>
                            <td>{{ $p->alamat2 }}</td>
                            <td>{{ $p->kota2 }}</td>
                            <td>{{ $p->propinsi2 }}</td>
                            <td>{{ $p->kodepos2 }}</td>
                            <td>{{ $p->alamat3 }}</td>
                            <td>{{ $p->kota3 }}</td>
                            <td>{{ $p->propinsi3 }}</td>
                            <td>{{ $p->kodepos3 }}</td>
                            <td>
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto" width="50">
                                @endif
                            </td>
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('be.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Motor</h2>
        <a href="" class="btn btn-primary"><i class="fas fa-cubes me-3"></i>Daftar Motor</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-white">
                <tr>
                    <th>ID</th>
                    <th>Nama Motor</th>
                    <th>ID Jenis</th>
                    <th>Harga Jual</th>
                    <th>Deskripsi Motor</th>
                    <th>Warna</th>
                    <th>Kapasitas Mesin</th>
                    <th>Tahun Produksi</th>
                    <th>Foto 1</th>
                    <th>Foto 2</th>
                    <th>Foto 3</th>
                    <th>Stok</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                {{-- Contoh data statis, ganti dengan @foreach jika sudah ada data dari controller --}}
                <tr>
                    <td>1</td>
                    <td>Honda Beat</td>
                    <td>2</td>
                    <td>15000000</td>
                    <td>Motor matic irit dan lincah</td>
                    <td>Merah</td>
                    <td>110cc</td>
                    <td>2022</td>
                    <td><img src="foto1.jpg" alt="Foto 1" width="60"></td>
                    <td><img src="foto2.jpg" alt="Foto 2" width="60"></td>
                    <td><img src="foto3.jpg" alt="Foto 3" width="60"></td>
                    <td>10</td>
                    <td>2024-06-01 10:00:00</td>
                    <td>2024-06-01 10:00:00</td>
                </tr>
                {{-- Tambahkan baris lain sesuai kebutuhan --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

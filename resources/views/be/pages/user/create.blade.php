@extends('be.master')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <span class="me-2"><i class="bi bi-person-plus-fill" style="font-size:1.5rem;"></i></span>
            <h2 class="mb-0 fs-4">Tambah User</h2>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-person me-1"></i>Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="Nama lengkap">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-envelope me-1"></i>Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="Email aktif">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-lock me-1"></i>Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Password user">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold"><i class="bi bi-person-badge me-1"></i>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="marketing">Marketing</option>
                        <option value="ceo">CEO</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap Icons CDN -->
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endpush
@endsection

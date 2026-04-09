@extends('be.master')

@section('content')
<div class="container mx-auto py-8 max-w-lg">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <span class="me-2"><i class="bi bi-person-circle" style="font-size:1.7rem;"></i></span>
            <h2 class="mb-0 fs-4">Detail User</h2>
        </div>
        <div class="card-body bg-light">
            <div class="mb-3 d-flex align-items-center">
                <span class="me-2"><i class="bi bi-person fs-5 text-secondary"></i></span>
                <span class="fw-semibold me-2">Nama:</span>
                <span>{{ $user->name }}</span>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <span class="me-2"><i class="bi bi-envelope fs-5 text-secondary"></i></span>
                <span class="fw-semibold me-2">Email:</span>
                <span>{{ $user->email }}</span>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <span class="me-2"><i class="bi bi-person-badge fs-5 text-secondary"></i></span>
                <span class="fw-semibold me-2">Role:</span>
                <span class="text-capitalize">{{ $user->role }}</span>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                <a href="{{ route('user.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Icons CDN -->
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endpush
@endsection

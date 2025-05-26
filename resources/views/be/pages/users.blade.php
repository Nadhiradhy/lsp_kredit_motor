@extends('be.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Users</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Email Verified At</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</div>
@endsection




@extends('be.master')

@section('content')
<div class="container mx-auto py-6 max-w-lg">
    <h2 class="text-2xl font-bold mb-4">Edit User</h2>
    <form action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" required value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Password <span class="text-gray-500 text-xs">(Kosongkan jika tidak ingin mengubah)</span></label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Role</label>
            <select name="role" class="w-full border px-3 py-2 rounded" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection

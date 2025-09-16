@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">User Details</h1>

    <div class="bg-white p-4 rounded shadow space-y-2">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role(s):</strong> {{ $user->roles->pluck('name')->join(', ') }}</p>
        <p><strong>Permissions:</strong> {{ $user->permissions->pluck('name')->join(', ') }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('users.edit', $user) }}" class="bg-yellow-600 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('users.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Back</a>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Manage Users</h1>

    <div class="mb-4 flex justify-between">
        <form method="GET" action="{{ route('users.index') }}" class="flex gap-2">
            <input type="text" name="search" placeholder="Search users..."
                   class="border rounded px-3 py-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        </form>
        <a href="{{ route('users.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Add New User</a>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Role</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b">
                <td class="p-3">{{ $user->name }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3">{{ $user->roles->pluck('name')->join(', ') }}</td>
                <td class="p-3 flex gap-2">
                    <a href="{{ route('users.show', $user) }}" class="text-blue-600">View</a>
                    <a href="{{ route('users.edit', $user) }}" class="text-yellow-600">Edit</a>
                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600"
                                onclick="return confirm('Delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block mb-1">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Role</label>
            <select name="role" class="w-full border rounded px-3 py-2">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" 
                        {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection

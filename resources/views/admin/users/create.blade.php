@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add New User</h1>

    <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Contact</label>
            <input type="text" name="contact" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Address</label>
            <input type="text" name="address" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Role</label>
            <select name="role" class="w-full border rounded px-3 py-2">
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
        </div>
    </form>
</div>
@endsection

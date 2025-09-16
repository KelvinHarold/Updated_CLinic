@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Permission</h1>

    <form action="{{ route('permissions.update', $permission) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Permission Name</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

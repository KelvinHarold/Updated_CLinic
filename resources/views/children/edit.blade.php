@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Child</h1>

    <form action="{{ route('children.update', $child->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $child->name }}" class="border px-2 py-1 rounded w-full">
        </div>
        <div>
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{ $child->dob }}" class="border px-2 py-1 rounded w-full">
        </div>
        <div>
            <label>Health Status</label>
            <input type="text" name="health_status" value="{{ $child->health_status }}" class="border px-2 py-1 rounded w-full">
        </div>
        <div>
            <label>Mama</label>
            <select name="mama_id" class="border px-2 py-1 rounded w-full">
                @foreach($mamas as $mama)
                    <option value="{{ $mama->id }}" {{ $mama->id == $child->mama_id ? 'selected' : '' }}>
                        {{ $mama->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Vaccination</h1>

    <form action="{{ route('vaccinations.update', $vaccination) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Child</label>
            <select name="child_id" class="w-full border rounded p-2">
                @foreach($children as $child)
                    <option value="{{ $child->id }}" {{ $vaccination->child_id == $child->id ? 'selected' : '' }}>
                        {{ $child->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ $vaccination->title }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Date</label>
            <input type="date" name="date" value="{{ $vaccination->date }}" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

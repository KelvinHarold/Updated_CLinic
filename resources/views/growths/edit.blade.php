@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Growth Record</h1>

    <form action="{{ route('growth-monitorings.update', $growth) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Child</label>
            <select name="child_id" class="w-full border rounded p-2">
                @foreach($children as $child)
                    <option value="{{ $child->id }}" {{ $growth->child_id == $child->id ? 'selected' : '' }}>
                        {{ $child->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Date</label>
            <input type="date" name="date" value="{{ $growth->date }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Weight (kg)</label>
            <input type="number" step="0.01" name="weight" value="{{ $growth->weight }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Height (cm)</label>
            <input type="number" step="0.1" name="height" value="{{ $growth->height }}" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

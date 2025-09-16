@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Mamas</h1>

    {{-- Search & Add --}}
    <div class="flex justify-between mb-4">
        <form method="GET" action="{{ route('mamas.index') }}" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search mama..."
                class="px-3 py-2 border rounded w-64">
            <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded">Search</button>
        </form>
        <a href="{{ route('mamas.create') }}" class="px-4 py-2 bg-green-500 text-white rounded">+ Add Mama</a>
    </div>

    {{-- Table --}}
    <table class="min-w-full bg-white border rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Age</th>
                <th class="py-2 px-4 border">Type</th>
                <th class="py-2 px-4 border">Pregnancy Stage</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mamas as $mama)
            <tr>
                <td class="py-2 px-4 border">{{ $mama->name }}</td>
                <td class="py-2 px-4 border">{{ $mama->age }}</td>
                <td class="py-2 px-4 border capitalize">{{ $mama->type }}</td>
                <td class="py-2 px-4 border">{{ $mama->pregnancy_stage ?? 'N/A' }}</td>
                <td class="py-2 px-4 border flex gap-2">
                    <a href="{{ route('mamas.show', $mama) }}" class="text-blue-500">View</a>
                    <a href="{{ route('mamas.edit', $mama) }}" class="text-green-500">Edit</a>
                    <form action="{{ route('mamas.destroy', $mama) }}" method="POST" onsubmit="return confirm('Delete this mama?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-3 text-center">No mamas found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

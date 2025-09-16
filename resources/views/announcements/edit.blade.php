@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Announcement</h1>

    <form action="{{ route('announcements.update', $announcement) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ $announcement->title }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Date</label>
            <input type="date" name="date" value="{{ $announcement->date }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4">{{ $announcement->description }}</textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

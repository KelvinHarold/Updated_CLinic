@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Announcement</h1>

    <form action="{{ route('announcements.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" placeholder="Announcement Title">
        </div>

        <div>
            <label class="block">Date</label>
            <input type="date" name="date" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4" placeholder="Announcement Details"></textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>
@endsection

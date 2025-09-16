@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Announcement Details</h1>

    <div class="bg-white p-4 shadow rounded mb-4">
        <p><strong>Title:</strong> {{ $announcement->title }}</p>
        <p><strong>Date:</strong> {{ $announcement->date }}</p>
        <p><strong>Description:</strong> {{ $announcement->description }}</p>
    </div>

    <a href="{{ route('announcements.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Back</a>
</div>
@endsection

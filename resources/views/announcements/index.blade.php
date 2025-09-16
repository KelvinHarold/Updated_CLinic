@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Announcements</h1>
        <a href="{{ route('announcements.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Announcement</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 border">Title</th>
                <th class="py-2 border">Date</th>
                <th class="py-2 border">Description</th>
                <th class="py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
            <tr>
                <td class="py-2 border">{{ $announcement->title }}</td>
                <td class="py-2 border">{{ $announcement->date }}</td>
                <td class="py-2 border">{{ Str::limit($announcement->description, 50) }}</td>
                <td class="py-2 border flex space-x-2">
                    <a href="{{ route('announcements.show',$announcement) }}" class="text-blue-500">View</a>
                    <a href="{{ route('announcements.edit',$announcement) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('announcements.destroy',$announcement) }}" method="POST" onsubmit="return confirm('Delete this announcement?');">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

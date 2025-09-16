@extends('layouts.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Reminders</h1>
        <a href="{{ route('reminders.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Reminder</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 border">Title</th>
                <th class="py-2 border">Description</th>
                <th class="py-2 border">Reminder Date</th>
                <th class="py-2 border">Status</th>
                {{-- <th class="py-2 border">Mama</th>
                <th class="py-2 border">Child</th> --}}
                <th class="py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reminders as $reminder)
            <tr>
                <td class="py-2 border">{{ $reminder->title }}</td>
                <td class="py-2 border">{{ $reminder->description }}</td>
                <td class="py-2 border">{{ \Carbon\Carbon::parse($reminder->reminder_date)->format('Y-m-d H:i') }}</td>
                <td class="py-2 border">{{ ucfirst($reminder->status) }}</td>
                {{-- <td class="py-2 border">{{ $reminder->mama->name ?? '-' }}</td>
                <td class="py-2 border">{{ $reminder->child->name ?? '-' }}</td> --}}
                <td class="py-2 border flex space-x-2">
                    <a href="{{ route('reminders.show', $reminder) }}" class="text-blue-500">View</a>
                    <a href="{{ route('reminders.edit', $reminder) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('reminders.destroy', $reminder) }}" method="POST" onsubmit="return confirm('Delete this reminder?');">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-3 text-gray-500">No reminders found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

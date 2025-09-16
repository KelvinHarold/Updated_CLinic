@extends('layouts.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">My Reminders</h1>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 border">Title</th>
                <th class="py-2 border">Description</th>
                <th class="py-2 border">Reminder Date</th>
                <th class="py-2 border">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reminders as $reminder)
                <tr>
                    <td class="py-2 border">{{ $reminder->title }}</td>
                    <td class="py-2 border">{{ $reminder->description }}</td>
                    <td class="py-2 border">
                        {{ \Carbon\Carbon::parse($reminder->reminder_date)->format('Y-m-d H:i') }}
                    </td>
                    <td class="py-2 border">
                        <span class="px-2 py-1 rounded text-white 
                            {{ $reminder->status == 'completed' ? 'bg-green-600' : 'bg-yellow-500' }}">
                            {{ ucfirst($reminder->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">
                        You have no reminders yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

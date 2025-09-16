@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Reminder</h1>

    <form action="{{ route('reminders.update', $reminder) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ $reminder->title }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $reminder->description }}</textarea>
        </div>

        <div>
            <label class="block">Reminder Date & Time</label>
            <input type="datetime-local" name="reminder_date" value="{{ \Carbon\Carbon::parse($reminder->reminder_date)->format('Y-m-d\TH:i') }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="pending" {{ $reminder->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $reminder->status === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <!-- Mama auto-filled (hidden) -->
        <input type="hidden" name="mama_id" value="{{ $reminder->mama_id }}">

        <!-- Child select -->
        @if($reminder->mama && $reminder->mama->children->count())
        <div>
            <label class="block">Child (optional)</label>
            <select name="child_id" class="w-full border rounded p-2">
                <option value="">-- None --</option>
                @foreach($reminder->mama->children as $child)
                    <option value="{{ $child->id }}" {{ $reminder->child_id == $child->id ? 'selected' : '' }}>
                        {{ $child->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @endif

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

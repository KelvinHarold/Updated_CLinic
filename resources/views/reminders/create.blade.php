@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Reminder</h1>

    <form action="{{ route('reminders.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" placeholder="Reminder Title" required>
        </div>

        <div>
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2" placeholder="Reminder Description"></textarea>
        </div>

        <div>
            <label class="block">Reminder Date & Time</label>
            <input type="datetime-local" name="reminder_date" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <!-- Mama auto-filled (hidden) -->
        <input type="hidden" name="mama_id" value="{{ $mama->id }}">

        <!-- Child select  -->
        @if($children->count())
        <div>
            <label class="block">Child (optional)</label>
            <select name="child_id" class="w-full border rounded p-2">
                <option value="">-- None --</option>
                @foreach($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>
@endsection

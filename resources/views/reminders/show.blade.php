@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Reminder Details</h1>

    <div class="bg-white p-4 shadow rounded mb-4">
        <p><strong>Title:</strong> {{ $reminder->title }}</p>
        <p><strong>Description:</strong> {{ $reminder->description ?? '-' }}</p>
        <p><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($reminder->reminder_date)->format('Y-m-d H:i') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($reminder->status) }}</p>
        {{-- <p><strong>Mama:</strong> {{ $reminder->mama->name ?? '-' }}</p>
        <p><strong>Child:</strong> {{ $reminder->child->name ?? '-' }}</p> --}}
    </div>

    <a href="{{ route('reminders.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Back</a>
</div>
@endsection

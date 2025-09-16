@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Appointment Details</h1>

    <div class="bg-white p-4 shadow rounded mb-4">
        <p><strong>Mama:</strong> {{ $appointment->mama->name }}</p>
        <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
        <p><strong>Date:</strong> {{ $appointment->date }}</p>
        <p><strong>Time:</strong> {{ $appointment->time }}</p>
        <p><strong>Type:</strong> {{ $appointment->type }}</p>
        <p><strong>Status:</strong> {{ ucfirst($appointment->status) }}</p>
    </div>

    {{-- Feedback visible only for receiver or Admin --}}
    @if(
        auth()->user()->hasRole('Admin') ||
        (auth()->user()->hasRole('Doctor') && $appointment->user_id != auth()->id()) ||
        (auth()->user()->hasAnyRole(['Breastfeeding Woman','Pregnant Woman']) && $appointment->mama_id != auth()->user()->mama->id)
    )
        <div class="bg-gray-100 p-4 rounded mb-4">
            <h3 class="font-bold mb-2">Feedback</h3>
            <p>{{ $appointment->feedback ?? 'No feedback yet.' }}</p>
        </div>
    @endif

    <div class="flex gap-4">
        <a href="{{ route('appointments.edit', $appointment) }}" class="px-4 py-2 bg-yellow-500 text-white rounded">Edit</a>
        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Delete this appointment?');">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
        </form>
    </div>
</div>
@endsection

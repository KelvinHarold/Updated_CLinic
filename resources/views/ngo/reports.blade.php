@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">NGO Health Reports</h1>

    @forelse($mamas as $mama)
        <div class="border rounded-lg p-4 mb-4 shadow">
            <h2 class="text-lg font-semibold">{{ $mama->name }} (Age: {{ $mama->age }})</h2>
            <p>Type: {{ ucfirst($mama->type) }}</p>
            <p>Pregnancy Stage: {{ $mama->pregnancy_stage ?? 'N/A' }}</p>

            {{-- Children --}}
            <div class="mt-3">
                <h3 class="font-semibold">Children:</h3>
                @forelse($mama->children as $child)
                    <p>- {{ $child->name }} (Age: {{ $child->age }})</p>
                @empty
                    <p class="text-gray-500">No children data.</p>
                @endforelse
            </div>

            {{-- Appointments --}}
            <div class="mt-3">
                <h3 class="font-semibold">Appointments:</h3>
                @forelse($mama->appointments as $appointment)
                    <p>- {{ $appointment->date }} ({{ ucfirst($appointment->status) }})</p>
                @empty
                    <p class="text-gray-500">No appointments data.</p>
                @endforelse
            </div>
        </div>
    @empty
        <p>No mama records found.</p>
    @endforelse
</div>
@endsection

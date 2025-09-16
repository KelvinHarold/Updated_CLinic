@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $mama->name }}'s Profile</h1>

    <p><strong>Age:</strong> {{ $mama->age }}</p>
    <p><strong>Type:</strong> {{ ucfirst($mama->type) }}</p>
    <p><strong>Pregnancy Stage:</strong> {{ $mama->pregnancy_stage ?? 'N/A' }}</p>

    {{-- Children --}}
    <h2 class="text-xl font-semibold mt-6 mb-2">Children</h2>
    @if($mama->children->count())
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">DOB</th>
                    <th class="py-2 px-4 border">Health Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mama->children as $child)
                <tr>
                    <td class="py-2 px-4 border">{{ $child->name }}</td>
                    <td class="py-2 px-4 border">{{ $child->dob }}</td>
                    <td class="py-2 px-4 border">{{ $child->health_status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No children found.</p>
    @endif

    {{-- Appointments --}}
    <h2 class="text-xl font-semibold mt-6 mb-2">Appointments</h2>
    @if($mama->appointments->count())
        <ul class="list-disc ml-6">
            @foreach($mama->appointments as $appointment)
                <li>{{ $appointment->date }} - {{ ucfirst($appointment->status) }}</li>
            @endforeach
        </ul>
    @else
        <p>No appointments found.</p>
    @endif
</div>
@endsection

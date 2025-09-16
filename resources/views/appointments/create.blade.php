@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Appointment</h1>

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Kama Admin au Doctor -> chagua Mama --}}
        @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Doctor'))
            <div>
                <label class="block font-medium mb-1">Mama</label>
                <select name="mama_id" class="w-full border rounded p-2">
                    @foreach($mamas as $mama)
                        <option value="{{ $mama->id }}">{{ $mama->name }}</option>
                    @endforeach
                </select>
            </div>
        @elseif(auth()->user()->hasRole('Breastfeeding Woman') || auth()->user()->hasRole('Pregnant Woman'))
            {{-- Mama akilogin -> hidden field ya mama_id --}}
            <input type="hidden" name="mama_id" value="{{ $mama->id }}" readonly>
            <p><strong>Mama:</strong> {{ $mama->name }}</p>
        @endif

        {{-- Kama Admin au Mama (Breastfeeding/Pregnant) -> chagua Doctor --}}
        @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Breastfeeding Woman') || auth()->user()->hasRole('Pregnant Woman'))
            <div>
                <label class="block font-medium mb-1">Doctor</label>
                <select name="user_id" class="w-full border rounded p-2">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
        @elseif(auth()->user()->hasRole('Doctor'))
            {{-- Doctor akilogin -> hidden field ya doctor_id --}}
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <p><strong>Doctor:</strong> {{ auth()->user()->name }}</p>
        @endif

        <div>
            <label class="block font-medium mb-1">Date</label>
            <input type="date" name="date" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Time</label>
            <input type="time" name="time" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Type</label>
            <input type="text" name="type" class="w-full border rounded p-2" placeholder="Checkup / Scan / Others" required>
        </div>

        <input type="hidden" name="status" value="pending">

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>
@endsection

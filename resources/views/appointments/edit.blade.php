@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Appointment</h1>

    <form action="{{ route('appointments.update', $appointment) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Mama</label>
            <select name="mama_id" class="w-full border rounded p-2">
                @foreach($mamas as $mama)
                    <option value="{{ $mama->id }}" {{ $appointment->mama_id == $mama->id ? 'selected' : '' }}>
                        {{ $mama->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Doctor</label>
            <select name="doctor_id" class="w-full border rounded p-2">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Date</label>
            <input type="date" name="date" value="{{ $appointment->date }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Time</label>
            <input type="time" name="time" value="{{ $appointment->time }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Type</label>
            <input type="text" name="type" value="{{ $appointment->type }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="pending" {{ $appointment->status=='pending'?'selected':'' }}>Pending</option>
                <option value="completed" {{ $appointment->status=='completed'?'selected':'' }}>Completed</option>
                <option value="cancelled" {{ $appointment->status=='cancelled'?'selected':'' }}>Cancelled</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Feedback</label>
            <textarea name="feedback" class="w-full border rounded p-2">{{ $appointment->feedback }}</textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>
</div>
@endsection

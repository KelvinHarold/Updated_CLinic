@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Appointments</h1>
        <a href="{{ route('appointments.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Appointment</a>
    </div>

    {{-- Filter by status --}}
    <form method="GET" action="{{ route('appointments.index') }}" class="mb-4">
        <select name="status" onchange="this.form.submit()" class="p-2 border rounded">
            <option value="">-- Filter by Status --</option>
            <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
            <option value="completed" {{ request('status')=='completed'?'selected':'' }}>Completed</option>
            <option value="cancelled" {{ request('status')=='cancelled'?'selected':'' }}>Cancelled</option>
        </select>
    </form>

    {{-- Appointments Table --}}
    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">Mama</th>
                <th class="p-3">Doctor</th>
                <th class="p-3">Date</th>
                <th class="p-3">Time</th>
                <th class="p-3">Type</th>
                <th class="p-3">Status</th>
                <th class="p-3">Feedback</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr class="border-b">
                <td class="p-3">{{ $appointment->mama?->name }}</td>
                <td class="p-3">{{ $appointment->doctor?->name }}</td>
                <td class="p-3">{{ $appointment->date }}</td>
                <td class="p-3">{{ $appointment->time }}</td>
                <td class="p-3">{{ $appointment->type }}</td>
                <td class="p-3">{{ ucfirst($appointment->status) }}</td>
                <td class="p-3">{{ $appointment->feedback ?? '—' }}</td>
                <td class="p-3 flex gap-2 items-center">
                    <a href="{{ route('appointments.show', $appointment) }}" class="text-blue-600">View</a>
                    <a href="{{ route('appointments.edit', $appointment) }}" class="text-yellow-600">Edit</a>
@php
    $user = auth()->user();
    $canGiveFeedback = false;

    // Doctor anaona feedback link tu kwa appointments zilizotumwa kwake (yaliyo-created na patient)
    if ($user->hasRole('Doctor') && $appointment->user_id == $user->id) {
        // hii ni appointment aliyemuumba, hapana feedback
        $canGiveFeedback = false;
    } elseif ($user->hasRole('Doctor') && $appointment->user_id != $user->id && $appointment->mama_id && !$appointment->feedback) {
        // appointment imemtumwa kwa doctor, haiko yet feedback
        $canGiveFeedback = true;
    }

    // Patient (Pregnant/Breastfeeding) anaona feedback link tu kwa appointments alizotumwa na doctor
    if ($user->hasAnyRole(['Pregnant Woman','Breastfeeding Woman']) && $appointment->mama?->user_id == $user->id && $appointment->user_id && !$appointment->feedback) {
        $canGiveFeedback = true;
    }
@endphp



                    @if($canGiveFeedback)
                        <a href="#" class="text-green-600"
                           onclick="openFeedbackModal({{ $appointment->id }}, '{{ $appointment->feedback ?? '' }}', '{{ $appointment->status }}')">
                            Feedback
                        </a>
                    @endif

                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Delete this appointment?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Feedback Modal --}}
<div id="feedbackModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Give Feedback</h2>
        <form id="feedbackForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="appointment_id" id="modalAppointmentId">

            <div class="mb-4">
                <label class="block font-medium mb-1">Status</label>
                <select name="status" id="modalStatus" class="w-full border rounded p-2">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Feedback</label>
                <textarea name="feedback" id="modalFeedback" class="w-full border rounded p-2" rows="4"></textarea>
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded" onclick="closeFeedbackModal()">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal JS --}}
<script>
function openFeedbackModal(id, feedback, status) {
    document.getElementById('feedbackModal').classList.remove('hidden');
    document.getElementById('modalAppointmentId').value = id;
    document.getElementById('modalFeedback').value = feedback;
    document.getElementById('modalStatus').value = status;
    document.getElementById('feedbackForm').action = '/appointments/' + id + '/feedback';
}

function closeFeedbackModal() {
    document.getElementById('feedbackModal').classList.add('hidden');
}
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="" x-data="{ openBranch: null }">
    <h1 class="text-2xl font-bold mb-4">{{ $mama->name }} - My Profile</h1>

    <div class="mb-2"><strong>Age:</strong> {{ $mama->age }}</div>
    <div class="mb-2"><strong>Type:</strong> {{ ucfirst($mama->type) }}</div>

    {{-- Medical Records grouped by date --}}
    <h2 class="text-xl font-semibold mt-6 mb-4">Medical Records</h2>

    @forelse($records as $date => $dayRecords)
        <div class="mb-4 border rounded">
            {{-- Branch Header --}}
            <button 
                class="w-full px-4 py-2 bg-blue-600 text-white font-semibold text-left rounded-t focus:outline-none"
                @click="openBranch === '{{ $date }}' ? openBranch = null : openBranch = '{{ $date }}'"
            >
                Records for {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
            </button>

            {{-- Branch Content --}}
            <div x-show="openBranch === '{{ $date }}'" x-transition class="p-4 bg-gray-50">
                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-3 py-2">#</th>
                            <th class="border px-3 py-2">Diagnosis</th>
                            <th class="border px-3 py-2">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dayRecords as $record)
                            <tr>
                                <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-3 py-2">{{ $record->diagnosis }}</td>
                                <td class="border px-3 py-2">{{ $record->results }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <p>No medical records found.</p>
    @endforelse

    <a href="{{ route('mamas.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded">Back</a>
</div>

{{-- AlpineJS CDN (required for accordion) --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection

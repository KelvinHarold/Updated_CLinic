@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Mamas</h1>

    {{-- Search & Add --}}
    <div class="flex justify-between mb-4">
        <form method="GET" action="{{ route('mamas.index') }}" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search mama..."
                class="px-3 py-2 border rounded w-64">
            <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded">Search</button>
        </form>
        <a href="{{ route('mamas.create') }}" class="px-4 py-2 bg-green-500 text-white rounded">+ Add Mama</a>
    </div>

    {{-- Table --}}
    <table class="min-w-full bg-white border rounded">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Age</th>
                <th class="py-2 px-4 border">Type</th>
                <th class="py-2 px-4 border">Pregnancy Stage</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mamas as $mama)
            <tr>
                <td class="py-2 px-4 border">{{ $mama->name }}</td>
                <td class="py-2 px-4 border">{{ $mama->age }}</td>
                <td class="py-2 px-4 border capitalize">{{ $mama->type }}</td>
                <td class="py-2 px-4 border">{{ $mama->pregnancy_stage ?? 'N/A' }}</td>
                <td class="py-2 px-4 border flex gap-2">
                    <a href="{{ route('mamas.show', $mama) }}" class="text-blue-500">View</a>
                    <a href="{{ route('mamas.edit', $mama) }}" class="text-green-500">Edit</a>

                    <!-- AddRecord button -->
                    <button 
                        type="button" 
                        onclick="openModal({{ $mama->id }}, '{{ $mama->name }}')" 
                        class="text-purple-500"
                    >
                        AddRecord
                    </button>

                    <form action="{{ route('mamas.destroy', $mama) }}" method="POST" onsubmit="return confirm('Delete this mama?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-3 text-center">No mamas found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Modal --}}
<div id="addRecordModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <h2 id="modalTitle" class="text-xl font-bold mb-4">Add Diagnosis & Results</h2>
        <form id="addRecordForm" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-medium">Diagnosis</label>
                <textarea name="diagnosis" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block font-medium">Results</label>
                <textarea name="results" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- Scripts --}}
<script>
    function openModal(mamaId, mamaName) {
        const modal = document.getElementById('addRecordModal');
        const form = document.getElementById('addRecordForm');
        const title = document.getElementById('modalTitle');

        // set dynamic action URL
        form.action = `/mamas/${mamaId}/store-record`;

        // set mama name in modal title
        title.textContent = `Add Diagnosis & Results for ${mamaName}`;

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('addRecordModal').classList.add('hidden');
    }
</script>
@endsection

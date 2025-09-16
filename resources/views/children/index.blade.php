@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">All Children</h1>

    <a href="{{ route('children.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Child</a>

    <form method="GET" action="{{ route('children.index') }}" class="mt-4 mb-4">
        <input type="text" name="search" placeholder="Search child..." class="border px-2 py-1 rounded">
        <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded">Search</button>
    </form>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Date of Birth</th>
                <th class="border px-4 py-2">Health Status</th>
                <th class="border px-4 py-2">Mama</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($children as $child)
            <tr>
                <td class="border px-4 py-2">{{ $child->name }}</td>
                <td class="border px-4 py-2">{{ $child->dob }}</td>
                <td class="border px-4 py-2">{{ $child->health_status }}</td>
                <td class="border px-4 py-2">{{ $child->mama->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('children.show', $child->id) }}" class="text-blue-600">View</a> |
                    <a href="{{ route('children.edit', $child->id) }}" class="text-green-600">Edit</a> |
                    <button type="button" onclick="openModal({{ $child->id }}, '{{ $child->name }}')" class="text-purple-600">
        Add Record
    </button> |
                    <form action="{{ route('children.destroy', $child->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this child?')" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{-- Modal --}}
<div id="addRecordModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
        <h2 id="modalTitle" class="text-xl font-bold mb-4">Add Diagnosis & Results</h2>
        <form id="addRecordForm" method="POST">
            @csrf
            <input type="hidden" name="child_id">
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



<script>
function openModal(childId, childName) {
    const modal = document.getElementById('addRecordModal');
    const form = document.getElementById('addRecordForm');
    const title = document.getElementById('modalTitle');

    form.action = `/children/${childId}/store-record`;
    form.querySelector('input[name="child_id"]').value = childId;
    title.textContent = `Add Diagnosis & Results for ${childName}`;

    modal.classList.remove('hidden');
}

function closeModal() {
    document.getElementById('addRecordModal').classList.add('hidden');
}
</script>
@endsection



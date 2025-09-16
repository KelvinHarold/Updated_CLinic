@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Vaccinations</h1>
        <a href="{{ route('vaccinations.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Vaccination</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 border">Child</th>
                <th class="py-2 border">Name</th>
                <th class="py-2 border">Date_Given</th>
                <th class="py-2 border">Next_Due</th>
                <th class="py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vaccinations as $vaccination)
            <tr>
                <td class="py-2 border">{{ $vaccination->child->name }}</td>
                <td class="py-2 border">{{ $vaccination->vaccine_name }}</td>
                <td class="py-2 border">{{ $vaccination->date_given }}</td>
                  <td class="py-2 border">{{ $vaccination->next_due }}</td>
                <td class="py-2 border flex space-x-2">
                    <a href="{{ route('vaccinations.show', $vaccination) }}" class="text-blue-500">View</a>
                    <a href="{{ route('vaccinations.edit', $vaccination) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('vaccinations.destroy', $vaccination) }}" method="POST" onsubmit="return confirm('Delete this vaccination?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

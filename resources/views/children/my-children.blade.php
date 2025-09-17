@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">My Children</h1>

    @if($children->isEmpty())
        <p>You don’t have any child records yet.</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Date of Birth</th>
                    <th class="border px-4 py-2">Health Status</th>
                    <th class="border px-4 py-2">Diagnosis</th>
                    <th class="border px-4 py-2">Results</th>
                    <th class="border px-4 py-2">Mama</th>
                </tr>
            </thead>
            <tbody>
                @foreach($children as $child)
                    @if($child->records->isEmpty())
                        <tr>
                            <td class="border px-4 py-2">{{ $child->name }}</td>
                            <td class="border px-4 py-2">{{ $child->dob }}</td>
                            <td class="border px-4 py-2">{{ $child->health_status ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">N/A</td>
                            <td class="border px-4 py-2">N/A</td>
                            <td class="border px-4 py-2">{{ $child->mama->name ?? 'N/A' }}</td>
                        </tr>
                    @else
                        @foreach($child->records as $record)
                            <tr>
                                <td class="border px-4 py-2">{{ $child->name }}</td>
                                <td class="border px-4 py-2">{{ $child->dob }}</td>
                                <td class="border px-4 py-2">{{ $child->health_status ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $record->diagnosis }}</td>
                                <td class="border px-4 py-2">{{ $record->results }}</td>
                                <td class="border px-4 py-2">{{ $child->mama->name ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

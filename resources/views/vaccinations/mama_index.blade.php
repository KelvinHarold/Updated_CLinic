@extends('layouts.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">My Children's Vaccinations</h1>

    @if($vaccinations->isEmpty())
        <p>No vaccinations recorded yet.</p>
    @else
        <table class="min-w-full bg-white border rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border">Child Name</th>
                    <th class="py-2 px-4 border">Vaccine Name</th>
                    <th class="py-2 px-4 border">Date Given</th>
                    <th class="py-2 px-4 border">Next Due</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vaccinations as $vacc)
                <tr>
                    <td class="py-2 px-4 border">{{ $vacc->child->name }}</td>
                    <td class="py-2 px-4 border">{{ $vacc->vaccine_name }}</td>
                    <td class="py-2 px-4 border">{{ $vacc->date_given }}</td>
                    <td class="py-2 px-4 border">{{ $vacc->next_due ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

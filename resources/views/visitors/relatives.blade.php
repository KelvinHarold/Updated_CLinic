@extends('layouts.app')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">My Mamas</h1>

    @forelse($relatives as $mama)
        <div class="border p-3 mb-2 rounded">
            <h2 class="text-lg font-semibold">{{ $mama->name }}</h2>
            <p>Age: {{ $mama->age }}</p>
            <p>Type: {{ ucfirst($mama->type) }}</p>
            <p>Pregnancy Stage: {{ $mama->pregnancy_stage ?? 'N/A' }}</p>
        </div>
    @empty
        <p>No mamas assigned to you yet.</p>
    @endforelse
</div>
@endsection

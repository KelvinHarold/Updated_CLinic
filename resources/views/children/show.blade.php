@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Child Details</h1>

    <div class="mb-4">
        <p><strong>Name:</strong> {{ $child->name }}</p>
        <p><strong>Date of Birth:</strong> {{ $child->dob }}</p>
        <p><strong>Health Status:</strong> {{ $child->health_status }}</p>
        <p><strong>Mama:</strong> {{ $child->mama->name }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Vaccinations</h2>
    <ul class="list-disc ml-6">
        @foreach($child->vaccinations as $vaccination)
            <li>{{ $vaccination->title }} - {{ $vaccination->date }}</li>
        @endforeach
    </ul>

    <h2 class="text-xl font-semibold mb-2 mt-4">Growth Records</h2>
    <ul class="list-disc ml-6">
        @foreach($child->growths as $growth)
            <li>{{ $growth->date }}: {{ $growth->weight }} kg, {{ $growth->height }} cm</li>
        @endforeach
    </ul>

    <a href="{{ route('children.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded mt-4 inline-block">Back</a>
</div>
@endsection

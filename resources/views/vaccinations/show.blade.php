@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Vaccination Details</h1>

    <div class="bg-white p-4 shadow rounded mb-4">
        <p><strong>Child:</strong> {{ $vaccination->child->name }}</p>
        <p><strong>Title:</strong> {{ $vaccination->title }}</p>
        <p><strong>Date:</strong> {{ $vaccination->date }}</p>
    </div>

    <a href="{{ route('vaccinations.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Back</a>
</div>
@endsection

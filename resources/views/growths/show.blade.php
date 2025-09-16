@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Growth Record Details</h1>

    <div class="bg-white p-4 shadow rounded mb-4">
        <p><strong>Child:</strong> {{ $growth->child->name }}</p>
        <p><strong>Date:</strong> {{ $growth->date }}</p>
        <p><strong>Weight:</strong> {{ $growth->weight }} kg</p>
        <p><strong>Height:</strong> {{ $growth->height }} cm</p>
    </div>

    <a href="{{ route('growth-monitorings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Back</a>
</div>
@endsection

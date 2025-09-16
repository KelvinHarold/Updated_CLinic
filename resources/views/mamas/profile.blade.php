@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">My Profile</h1>

    <div class="mb-2"><strong>Name:</strong> {{ $mama->name }}</div>
    <div class="mb-2"><strong>Age:</strong> {{ $mama->age }}</div>
    <div class="mb-2"><strong>Type:</strong> {{ ucfirst($mama->type) }}</div>

    {{-- Only show Pregnancy Stage if type is pregnant --}}
    @if($mama->type === 'pregnant')
        <div class="mb-2"><strong>Pregnancy Stage:</strong> {{ $mama->pregnancy_stage ?? 'N/A' }}</div>
    @endif

    <div class="mb-2"><strong>Diagnosis:</strong> {{ $mama->diagnosis ?? 'N/A' }}</div>
    <div class="mb-2"><strong>Results:</strong> {{ $mama->results ?? 'N/A' }}</div>
    <div class="mb-2"><strong>Contact:</strong> {{ $mama->contact ?? 'N/A' }}</div>
    <div class="mb-2"><strong>Address:</strong> {{ $mama->address ?? 'N/A' }}</div>
    <div class="mb-2"><strong>Email:</strong> {{ $mama->email ?? 'N/A' }}</div>

    <a href="{{ route('mamas.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded">Back</a>
</div>
@endsection

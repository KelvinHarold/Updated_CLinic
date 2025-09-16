@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">My Profile</h1>

    <div class="mb-2"><strong>Name:</strong> {{ $mama->name }}</div>
   

    <div class="mb-2"><strong>Pregnancy Stage:</strong> {{ $mama->pregnancy_stage ?? 'N/A' }}</div>
    <div class="mb-2"><strong>Medical History:</strong> {{ $mama->medical_history ?? 'N/A' }}</div>
 


    <a href="{{ route('mamas.index') }}" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded">Back</a>
</div>
@endsection

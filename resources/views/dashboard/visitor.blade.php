@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Visitor Dashboard</h1>

    

    <a href="{{ route('visitor.relatives') }}" class="px-4 py-2 bg-blue-500 text-white rounded">
        View Relatives
    </a>
</div>
@endsection

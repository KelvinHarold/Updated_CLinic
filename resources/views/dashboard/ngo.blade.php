@extends('layouts.app')
@section('title','NGO Dashboard')
@section('content')
<h1 class="text-2xl font-bold mb-4">NGO Dashboard</h1>
<div class="bg-white p-4 rounded shadow">
    Total Mamas: {{ App\Models\Mama::count() }}
    Total Children: {{ App\Models\Child::count() }}
</div>
@endsection

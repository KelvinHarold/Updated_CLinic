@extends('layouts.app')
@section('title','My Dashboard')
@section('content')
<h1 class="text-2xl font-bold mb-4">My Dashboard</h1>
<div class="grid grid-cols-2 gap-4">
    <div class="bg-white p-4 rounded shadow">Upcoming Appointments: {{ auth()->user()->appointments()->where('status','pending')->count() }}</div>
    <div class="bg-white p-4 rounded shadow">Health Records Updated: {{ auth()->user()->mama->id ?? 'N/A' }}</div>
</div>
@endsection

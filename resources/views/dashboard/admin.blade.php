@extends('layouts.app')
@section('title','Admin Dashboard')
@section('content')
<h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

<div class="grid grid-cols-4 gap-6">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Total Users</h2>
        <p class="text-2xl">{{ App\Models\User::count() }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Total Mamas</h2>
        <p class="text-2xl">{{ App\Models\Mama::count() }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Total Children</h2>
        <p class="text-2xl">{{ App\Models\Child::count() }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Appointments Today</h2>
        <p class="text-2xl">{{ App\Models\Appointment::whereDate('date', now())->count() }}</p>
    </div>
</div>
@endsection

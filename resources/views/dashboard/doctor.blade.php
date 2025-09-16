@extends('layouts.app')
@section('title','Doctor Dashboard')
@section('content')
<h1 class="text-3xl font-bold mb-6">Doctor Dashboard</h1>

<div class="grid grid-cols-3 gap-6">
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Appointments Today</h2>
        <p class="text-2xl">{{ auth()->user()->appointments()->whereDate('date', now())->count() }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Assigned Mamas</h2>
        <p class="text-2xl">{{ auth()->user()->appointments()->distinct('mama_id')->count() }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold">Announcements</h2>
        <p class="text-2xl">{{ App\Models\Announcement::count() }}</p>
    </div>
</div>
@endsection

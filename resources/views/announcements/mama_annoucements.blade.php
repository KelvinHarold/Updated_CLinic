@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 p-6">
    <h1 class="text-2xl font-bold mb-4">Announcements</h1>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 border">Title</th>
                <th class="py-2 border">Date</th>
                <th class="py-2 border">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
            <tr>
                <td class="py-2 border">{{ $announcement->title }}</td>
                <td class="py-2 border">{{ $announcement->date }}</td>
                <td class="py-2 border">{{ $announcement->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

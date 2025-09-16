@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Start a Chat</h1>

    @if($users->isEmpty())
        <p class="text-gray-500">No other users available.</p>
    @else
        <ul class="space-y-2">
            @foreach($users as $user)
                <li>
                    <a href="{{ route('chats.index', ['receiver' => $user->id]) }}"
                       class="block p-3 border rounded hover:bg-gray-100">
                        {{ $user->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

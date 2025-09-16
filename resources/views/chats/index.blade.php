@extends('layouts.app')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Chat with {{ $receiver->name }}</h1>

    <div class="bg-white shadow rounded p-4 h-[400px] overflow-y-auto mb-4" id="chatBox">
        @foreach($messages as $message)
            <div class="mb-2 {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                <span class="font-bold">{{ $message->sender->name }}:</span>
                <span>{{ $message->message }}</span> {{-- Hapa lazima itumie 'message' --}}
                <span class="text-gray-400 text-xs ml-2">{{ $message->created_at->format('H:i') }}</span>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chats.store') }}" method="POST" class="flex space-x-2">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <input type="text" name="message" class="flex-1 border rounded p-2" placeholder="Type a message">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Send</button>
    </form>
</div>

<script>
    const chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>
@endsection

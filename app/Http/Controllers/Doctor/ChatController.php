<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
public function index($receiverId = null)
{
    if ($receiverId) {
        $receiver = User::findOrFail($receiverId);

        // Pata messages zote kati ya logged-in user na receiver
        $messages = Chat::where(function($q) use ($receiverId) {
            $q->where('sender_id', auth()->id())
              ->where('receiver_id', $receiverId);
        })->orWhere(function($q) use ($receiverId) {
            $q->where('sender_id', $receiverId)
              ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')
          ->get();

        return view('chats.index', compact('messages', 'receiver'));
    } else {
        // List ya users kuanza chat
        $users = User::where('id', '!=', auth()->id())->get();
        return view('chats.list', compact('users'));
    }
}


public function store(Request $request)
{
    $validated = $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message' => 'required|string', // must match DB column
    ]);

    Chat::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $validated['receiver_id'],
        'message' => $validated['message'], // match DB
    ]);

    return redirect()->route('chats.index', ['receiver' => $validated['receiver_id']]);
}

}

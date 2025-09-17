<?php

namespace App\Http\Controllers\Mama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reminder;
use App\Models\Mama;
use App\Models\Child;

class ReminderController extends Controller
{
  public function index()
{
    // Pata mama profile inayohusiana na user aliye login
    $mama = auth()->user()->mama; // relation ya User->mama()
    
    if (!$mama) {
        return redirect()->route('reminders.index')
                         ->withErrors(['msg' => 'Mama profile not found.']);
    }

    // Pata reminders zake
    $reminders = $mama->reminders()->orderBy('reminder_date', 'asc')->get();

    return view('reminders.index', compact('reminders'));
}


public function store(Request $request)
{
    // Validate input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'reminder_date' => 'required|date',
        'status' => 'required|in:pending,completed',
        'child_id' => 'nullable|exists:children,id', // optional
    ]);

    // Pata mama profile inayohusiana na user aliye login
    $mama = Mama::where('user_id', auth()->user()->id)->first();
    if (!$mama) {
        return back()->withErrors(['msg' => 'Mama profile not found for this user.']);
    }

    // Create reminder
    Reminder::create([
        'title' => $request->title,
        'description' => $request->description,
        'reminder_date' => $request->reminder_date,
        'status' => $request->status,
        'mama_id' => $mama->id,
        'child_id' => $request->child_id ?: null, // optional
    ]);

    return redirect()->route('reminders.index')
                     ->with('success', 'Reminder created successfully.');
}


    public function show(Reminder $reminder)
    {
        return view('reminders.show', compact('reminder'));
    }

    public function edit(Reminder $reminder)
    {
        $mamas = Mama::all();
        $children = Child::all();
        return view('reminders.edit', compact('reminder', 'mamas', 'children'));
    }

    public function update(Request $request, Reminder $reminder)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'mama_id' => 'required|exists:mamas,id',
            'child_id' => 'nullable|exists:children,id',
        ]);

        $reminder->update($request->only(
            'title','description','reminder_date','status','mama_id','child_id'
        ));

        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    public function destroy(Reminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }


public function create()
{
    // Pata mama profile inayohusiana na user aliye login
    $mama = auth()->user()->mama; // User->mama() relation

    if (!$mama) {
        return redirect()->route('reminders.index')
                         ->withErrors(['msg' => 'Mama profile not found.']);
    }

    // Pata children wa mama huyu
    $children = $mama->children ?? collect();

    // Return view
    return view('reminders.create', compact('mama', 'children'));
}

}

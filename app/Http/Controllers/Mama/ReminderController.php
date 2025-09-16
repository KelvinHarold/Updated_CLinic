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
    $mama = auth()->user(); // currently logged-in mama
    $reminders = Reminder::where('mama_id', $mama->id)->get();

    return view('reminders.index', compact('reminders'));
}
    public function create()
{
    // Assume mama ni currently logged-in user
    $mama = auth()->user(); // au select default mama unayotaka
    $children = $mama->children ?? collect(); // Collection ya children ya mama, empty ikiwa hana

    return view('reminders.create', compact('mama', 'children'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'reminder_date' => 'required|date',
        'status' => 'required|in:pending,completed',
    ]);

    // Auto-fill mama_id
    $mama_id = auth()->user()->id; // au default mama
    $child_id = $request->child_id ?: null; // optional

    Reminder::create([
        'title' => $request->title,
        'description' => $request->description,
        'reminder_date' => $request->reminder_date,
        'status' => $request->status,
        'mama_id' => $mama_id,
        'child_id' => $child_id,
    ]);

    return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
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

    public function myReminders()
{
    $mama = auth()->user(); // mama aliye login
    $reminders = Reminder::where('mama_id', $mama->id)->orderBy('reminder_date', 'asc')->get();

    return view('reminders.my', compact('reminders'));
}

}

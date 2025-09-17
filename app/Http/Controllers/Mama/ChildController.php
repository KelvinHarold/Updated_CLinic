<?php

namespace App\Http\Controllers\Mama;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Mama;
use App\Models\ChildRecord; // Model mpya kwa records
use Illuminate\Http\Request;

class ChildController extends Controller
{
    // Show all children
    public function index() {
        $children = Child::with('records','mama')->get(); // load records & mama
        return view('children.index', compact('children'));
    }

    // Show create form
    public function create() {
        $mamas = Mama::all();
        return view('children.create', compact('mamas'));
    }

    // Store new child
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'mama_id' => 'required|exists:mamas,id',
            'health_status' => 'nullable|string',
        ]);

        Child::create($validated); // save to children table

        return redirect()->route('children.index')->with('success', 'Child added successfully!');
    }

    // Store diagnosis & results (modal)
    public function storeRecord(Request $request, Child $child)
    {
        $validated = $request->validate([
            'diagnosis' => 'required|string',
            'results' => 'required|string',
        ]);

        // Save to child_records table
        $child->records()->create([
            'diagnosis' => $validated['diagnosis'],
            'results' => $validated['results'],
        ]);

        return redirect()->route('children.index')->with('success', 'Diagnosis & Results added successfully!');
    }

    // Show a single child
    public function show(Child $child) {
        $child->load('records','mama'); // load relations
        return view('children.show', compact('child'));
    }

    // Edit child
    public function edit(Child $child) {
        $mamas = Mama::all();
        return view('children.edit', compact('child','mamas'));
    }

    // Update child
    public function update(Request $request, Child $child) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'mama_id' => 'required|exists:mamas,id',
            'health_status' => 'nullable|string'
        ]);

        $child->update($validated);
        return redirect()->route('children.index')->with('success', 'Child updated successfully!');
    }

    // Delete child
    public function destroy(Child $child) {
        $child->delete();
        return redirect()->route('children.index')->with('success', 'Child deleted successfully!');
    }

    // My children for logged-in mama
    public function myChildren()
    {
        $mama = Mama::where('user_id', auth()->id())->with('children.records')->first();

        if (!$mama) {
            return redirect()->back()->with('error', 'Mama profile not found.');
        }

        $children = $mama->children;

        return view('children.my-children', compact('children', 'mama'));
    }
}

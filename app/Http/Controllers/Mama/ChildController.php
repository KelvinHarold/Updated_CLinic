<?php

namespace App\Http\Controllers\Mama;
use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Mama;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index() {
        $children = Child::all();
        return view('children.index', compact('children'));
    }

    public function create() {
        $mamas = Mama::all();
        return view('children.create', compact('mamas'));
    }

public function storeRecord(Request $request, Child $child)
{
    $validated = $request->validate([
        'diagnosis' => 'required|string',
        'results' => 'required|string',
    ]);

    // Create new record for child
    $newChildRecord = $child->replicate(); // replicate all existing fields
    $newChildRecord->diagnosis = $validated['diagnosis'];
    $newChildRecord->results = $validated['results'];
    $newChildRecord->push(); // save as new row

    return redirect()->route('children.index')->with('success', 'Diagnosis & Results added successfully!');
}


    public function show(Child $child) {
        return view('children.show', compact('child'));
    }

    public function edit(Child $child) {
        $mamas = Mama::all();
        return view('children.edit', compact('child','mamas'));
    }

    public function update(Request $request, Child $child) {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'dob'=>'required|date',
            'mama_id'=>'required|exists:mamas,id',
            'health_status'=>'nullable|string'
        ]);

        $child->update($validated);
        return redirect()->route('children.index');
    }

    public function destroy(Child $child) {
        $child->delete();
        return redirect()->route('children.index');
    }


    public function myChildren()
{
    $mama = Mama::where('user_id', auth()->id())->with('children')->first();

    if (!$mama) {
        return redirect()->back()->with('error', 'Mama profile not found.');
    }

    $children = $mama->children;

    return view('children.my-children', compact('children', 'mama'));
}

}

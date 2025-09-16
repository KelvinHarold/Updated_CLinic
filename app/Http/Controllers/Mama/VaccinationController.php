<?php

namespace App\Http\Controllers\Mama;
use App\Http\Controllers\Controller;
use App\Models\Vaccination;
use App\Models\Child;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    public function index() {
        $vaccinations = Vaccination::all();
        return view('vaccinations.index', compact('vaccinations'));
    }

    public function create() {
        $children = Child::all();
        return view('vaccinations.create', compact('children'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'child_id'=>'required|exists:children,id',
            'vaccine_name'=>'required|string',
            'date_given'=>'required|date',
            'next_due'=>'nullable|date'
        ]);

        Vaccination::create($validated);
        return redirect()->route('vaccinations.index');
    }

    public function edit(Vaccination $vaccination) {
        $children = Child::all();
        return view('vaccinations.edit', compact('vaccination','children'));
    }

    public function update(Request $request, Vaccination $vaccination) {
        $validated = $request->validate([
            'child_id'=>'required|exists:children,id',
            'vaccine_name'=>'required|string',
            'date_given'=>'required|date',
            'next_due'=>'nullable|date'
        ]);

        $vaccination->update($validated);
        return redirect()->route('vaccinations.index');
    }

    public function destroy(Vaccination $vaccination) {
        $vaccination->delete();
        return redirect()->route('vaccinations.index');
    }

    public function indexForMama()
{
    $user = auth()->user();

    // Tafuta Mama record inayohusiana na huyu user
    $mama = \App\Models\Mama::where('user_id', $user->id)->first();

    if (!$mama) {
        // Ukikosa mama, rudisha error au page tupu
        abort(403, 'Huna taarifa za mama kwenye system');
    }

    // Pata vaccinations za watoto wake
    $vaccinations = \App\Models\Vaccination::whereIn(
        'child_id',
        $mama->children->pluck('id')
    )->get();

    return view('vaccinations.mama_index', compact('vaccinations'));
}

}

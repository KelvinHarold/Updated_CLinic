<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Mama;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request) {
    $query = Appointment::query();

    // Ikiwa ni Doctor -> aone zake tu
    if (Auth::user()->hasRole('Doctor')) {
        $query->where('user_id', Auth::id());
    }

   // Ikiwa ni Patient (Pregnant/Breastfeeding) -> aone zake tu
if (Auth::user()->hasAnyRole(['Pregnant Woman', 'Breastfeeding Woman'])) {
    $mama = Auth::user()->mama; // assuming relation exists
    $query->where('mama_id', $mama->id ?? null);
}


    // Admin aone zote
    $appointments = $query->with(['mama','doctor'])->get();

    return view('appointments.index', compact('appointments'));
}
public function create()
{
    $mamas = Mama::all();
    $doctors = User::role('Doctor')->get();

    $mama = null;
    if (auth()->user()->hasRole('Breastfeeding Woman') || auth()->user()->hasRole('Pregnant Woman')) {
        $mama = Mama::where('user_id', auth()->id())->first();
    }

    return view('appointments.create', compact('mamas', 'doctors', 'mama'));
}


public function store(Request $request) {
    $validated = $request->validate([
        'mama_id'=>'nullable|exists:mamas,id',
        'user_id'=>'nullable|exists:users,id',
        'date'=>'required|date',
        'time'=>'required',
        'type'=>'required|string',
        'status'=>'required|string',
        'feedback'=>'nullable|string'
    ]);

    // Mama logged in -> mama_id auto
    if (Auth::user()->hasRole('Mama')) {
        $validated['mama_id'] = Auth::user()->mama->id;
    }

    // Doctor logged in -> user_id auto
    if (Auth::user()->hasRole('Doctor')) {
        $validated['user_id'] = Auth::id();
    }

    Appointment::create($validated);
    return redirect()->route('appointments.index')->with('success','Appointment created successfully');
}


    public function show(Appointment $appointment) {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment) {
        $mamas = Mama::all();
        $doctors = User::role('Doctor')->get();
        return view('appointments.edit', compact('appointment','mamas','doctors'));
    }

    public function update(Request $request, Appointment $appointment) {
        $validated = $request->validate([
            'mama_id'=>'required|exists:mamas,id',
            'user_id'=>'required|exists:users,id',
            'date'=>'required|date',
            'time'=>'required',
            'type'=>'required|string',
            'status'=>'required|string',
            'feedback'=>'nullable|string'
        ]);

        $appointment->update($validated);
        return redirect()->route('appointments.index');
    }

    public function destroy(Appointment $appointment) {
        $appointment->delete();
        return redirect()->route('appointments.index');
    }



    public function feedback(Request $request, Appointment $appointment)
{
    $validated = $request->validate([
        'status' => 'required|string',
        'feedback' => 'nullable|string'
    ]);

    $appointment->update($validated);

    return redirect()->route('appointments.index')->with('success', 'Feedback saved successfully!');
}

}

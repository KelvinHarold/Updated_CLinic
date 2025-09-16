<?php

namespace App\Http\Controllers\Mama;

use App\Models\Mama;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MamaController extends Controller
{
    public function index() {
        $mamas = Mama::all();
        return view('mamas.index', compact('mamas'));
    }


public function create() {
    $visitors = Role::findByName('Visitor')->users;
    return view('mamas.create', compact('visitors'));
}


public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'contact' => 'nullable|string',
        'address' => 'nullable|string',
        'pregnancy_stage' => 'nullable|string',
        'medical_history' => 'nullable|string',
        'type' => 'required|string', // pregnant or breastfeeding
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'visitor_id' => 'required|exists:users,id', // User with role Visitor
    ]);

    // Create user first
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Create mama profile
    $latest = Mama::latest('id')->first();
    $nextId = $latest ? $latest->id + 1 : 1;
    $validated['id_number'] = 'MAMA' . str_pad($nextId, 4, '0', STR_PAD_LEFT); 
    $validated['user_id'] = $user->id;

    $mama = Mama::create($validated);

    // Attach visitor
    $mama->visitors()->attach($validated['visitor_id']);

    return redirect()->route('mamas.index')->with('success', 'Mama created successfully!');
}


    public function show(Mama $mama) {
        return view('mamas.show', compact('mama'));
    }

    public function edit(Mama $mama) {
        return view('mamas.edit', compact('mama'));
    }

    public function update(Request $request, Mama $mama) {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'age'=>'required|integer',
            'contact'=>'nullable|string',
            'address'=>'nullable|string',
            'pregnancy_stage'=>'nullable|string',
            'medical_history'=>'nullable|string',
            'type'=>'required|string',
        ]);

        $mama->update($validated);

        return redirect()->route('mamas.index')->with('success', 'Mama updated successfully!');
    }

    public function destroy(Mama $mama) {
        $mama->delete();
        return redirect()->route('mamas.index')->with('success', 'Mama deleted successfully!');
    }


    public function profile()
{
    // Pata mama anayelogin kwa user_id
    $mama = Mama::where('user_id', auth()->id())->first();

    if (!$mama) {
        abort(404, "Profile not found");
    }

    return view('mamas.profile', compact('mama'));
}

    
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

public function store(Request $request) {
    $validated = $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6',
        'role'=>'required|string',
        'contact'=>'nullable|string',
        'address'=>'nullable|string',
    ]);

    $user = User::create([
        'name'=>$validated['name'],
        'email'=>$validated['email'],
        'password'=>bcrypt($validated['password']),
        'contact'=>$validated['contact'] ?? null,
        'address'=>$validated['address'] ?? null,
    ]);

    $user->assignRole($validated['role']);

    return redirect()->route('users.index');
}


    public function edit(User $user) {
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'role'=>'required|string'
        ]);

        $user->update($validated);
        $user->syncRoles([$validated['role']]);
        return redirect()->route('users.index');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function show(User $user)
{
    // Load roles if needed
    $user->load('roles');

    return view('admin.users.show', compact('user'));
}

}

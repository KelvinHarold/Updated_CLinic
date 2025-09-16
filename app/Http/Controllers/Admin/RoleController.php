<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success','Role created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

  public function update(Request $request, Role $role)
{
    $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'permissions' => 'nullable|array'
    ]);

    $role->update(['name' => $request->name]);

    if ($request->has('permissions')) {
        // Convert IDs to names
        $permissions = Permission::whereIn('id', $request->permissions)
            ->pluck('name')
            ->toArray();

        $role->syncPermissions($permissions);
    } else {
        $role->syncPermissions([]); // clear permissions if none selected
    }

    return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
}


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully.');
    }
}

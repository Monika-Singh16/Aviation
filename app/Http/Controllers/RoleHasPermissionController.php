<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use RoleHasPermission;

class RoleHasPermissionController extends Controller
{
    // Show all roles with their permissions
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.pages.rolehaspermissions.index', compact('roles'));
    }


    // Show form to assign permissions to a role
    public function edit($role_id)
    {
        $role = Role::with('permissions')->findOrFail($role_id);
        $permissions = Permission::all(); // all available permissions
        return view('admin.pages.rolehaspermissions.edit', compact('role', 'permissions'));
    }

    // Save assigned permissions to a role
    public function update(Request $request, $role_id)
    {
        $role = Role::findOrFail($role_id);

        // Validate permission IDs
        $data = $request->validate([
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id'
        ]);

        // Sync permissions in pivot table
        $role->permissions()->sync($data['permission_ids']);

        return redirect()->route('role-permissions.index')
         ->with('success', 'Permissions updated successfully!');
    }
}

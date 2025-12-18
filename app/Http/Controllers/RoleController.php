<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //get all data
    public function index()
    {
        $roles = Role::all();
        return view('admin.pages.roles.index', compact('roles'));
    }

    //Create a new role
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    //Store the data in db
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

          Role::create($data);

        // Redirect back with success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    //Fetch the role by id
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.pages.roles.edit', compact('role'));
    }

    //Update the record
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id
        ]);

        $role->update($data);
        
        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    //Delete a record
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}

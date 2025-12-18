<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    //Get all permissions
    public function index()
    {
        $permissions = Permission::orderBy('id', 'asc')->paginate(10);
        return view('admin.pages.permissions.index',compact('permissions'));
    }

    //create a new permission
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    //Store the data in db
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'description' => 'nullable|string'
        ]);

        Permission::create($data);

        //Redirect back wth success message
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
    }

    //Fetch the permission by id
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
         return view('admin.pages.permissions.edit', compact('permission'));
        // dd($permission);
    }

    //Update the permission
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|unique:permissions,name' . $permission->id,
            'description' => 'nullable|string'
        ]);

        $permission->update($data);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }

    //Delete a record
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission created succesfully');
    }
}



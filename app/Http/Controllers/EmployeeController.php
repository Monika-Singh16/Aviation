<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Role;


class EmployeeController extends Controller
{
    //get all data from db and pass them to index file
    public function index()
    {
        $employees = Employee::with('role')->get();
        return view('admin.pages.employees.index', compact('employees'));
    }

    public function show($id)
    {
        // Fetch employee by ID
        $employee = Employee::findOrFail($id);

        // Pass to a Blade view
        return view('admin.pages.employees.show', compact('employee'));
    }

    //Show a form to add new employee
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.employees.create', compact('roles'));
    }

    //save new employee to db
    public function store(Request $request)
    {
        $data = $request->validate([
            'role_id'               => 'required|exists:roles,id',
            'name'                  =>  'required|string|max:255',                 
            'email'                 =>  'required|email|unique:employees,email',
            'password'              =>  'required|min:6',
            'contact_no'            =>  'required|numeric|digits_between:10,15',
        ]);

          // ✅ Hash password before saving
            $data['password'] = bcrypt($data['password']);

            Employee::create($data);

        // ✅ Redirect back with success message
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    //Fetch employee by id
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $roles = Role::all();
        return view('admin.pages.employees.edit', compact('employee', 'roles'));
    }

    //Update employee info
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->validate([
            'role_id'               => 'sometimes|required|exists:roles,id',
            'name'                  =>  'sometimes|required|string|max:255',                 
            'email'                 =>  'sometimes|required|email|unique:employees,email,' . $employee->emp_id . ',emp_id',
            'password'              =>  'sometimes|required|min:6',
            'contact_no'            =>  'sometimes|required|numeric|digits_between:10,15',
        ]);

        // If password is provided, hash it before saving
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // If password is not provided, remove it from the data array to avoid overwriting
            unset($data['password']);
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    //delete a record
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

         // Prevent deleting Admin
        if (strtolower($employee->role->name ?? '') === 'admin') {
            return redirect()->back()->with('error', 'You cannot delete an Admin account.');
        }
        
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}

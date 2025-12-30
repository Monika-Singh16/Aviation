<?php

namespace App\Http\Controllers;
use App\Models\State;

use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::get();
        return view('admin.pages.states.index', compact('states'));
    }

    public function create()
    {
        return view('admin.pages.states.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        State::create([
            'name'      => $request->name,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('states.index')->with('success', 'State created successfully.');
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        return view('admin.pages.states.edit', compact('state'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $state = State::findOrFail($id);
        $state->update([
            'name'      => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('states.index')->with('success', 'State updated successfully.');
    }

    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        return redirect()->route('states.index')->with('success', 'State deleted successfully.');
    }

    public function show($id)
    {
        $state = State::with('cities')->findOrFail($id);
        return view('admin.pages.states.show', compact('state'));
    }
}

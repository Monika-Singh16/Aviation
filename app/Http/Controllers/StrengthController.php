<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strength;

class StrengthController extends Controller
{
    // Show all Strength sections
    public function index()
    {
        $strengths = Strength::get();
        return view('admin.pages.strength.index', compact('strengths'));
    }

    // Show form to create a new Strength sections
    public function create()
    {
        return view('admin.pages.strength.create');
    }

    // Store new Strength sections
    public function store(Request $request)
    {
        $request->validate([
            'sub_title'         => 'nullable|string|max:255',
            'title'             => 'nullable|string|max:255',
            'card_icon'         => 'nullable|string|max:255',
            'card_title'        => 'nullable|string|max:255',
            'card_description'  => 'nullable|string',
        ]);

        Strength::create([
            'sub_title'         => $request->sub_title,
            'title'             => $request->title,
            'card_icon'         => $request->card_icon,
            'card_title'        => $request->card_title,
            'card_description'  => $request->card_description,
            'is_active'         => $request->is_active ? 1 : 0,
        ]);

        return redirect()
            ->route('strength.index')
            ->with('success', 'Strength section created successfully.');
    }

    public function show($id)
    {
        $strength = Strength::findOrFail($id);
        return view('admin.pages.strength.show', compact('strength'));
    }

    // Show edit form
    public function edit($id)
    {
        $strength = Strength::findOrFail($id);
        return view('admin.pages.strength.edit', compact('strength'));
    }

    // Update the Strength section
    public function update(Request $request, $id)
    {
        $strength = Strength::findOrFail($id);

        $request->validate([ 
            'sub_title'         => 'nullable|string|max:255',
            'title'             => 'nullable|string|max:255',
            'card_icon'         => 'nullable|string|max:255',
            'card_title'        => 'nullable|string|max:255',
            'card_description'  => 'nullable|string',
        ]);

        $strength->update([
            'sub_title'         => $request->sub_title,
            'title'             => $request->title,
            'card_icon'         => $request->card_icon,
            'card_title'        => $request->card_title,
            'card_description'  => $request->card_description,
            'is_active'         => $request->is_active ? 1 : 0,
        ]);

        return redirect()
            ->route('strength.index')
            ->with('success', 'strength section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $strength = Strength::findOrFail($id);
        $strength->delete();

        return redirect()->route('strength.index')->with('success', 'strength section deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Excellence;

class ExcellenceController extends Controller
{
    // Show all Excellence sections
    public function index()
    {
        $excellences = Excellence::get();
        return view('admin.pages.excellence.index', compact('excellences'));
    }

    // Show form to create a new Excellence sections
    public function create()
    {
        return view('admin.pages.excellence.create');
    }

    // Store new Excellence sections
    public function store(Request $request)
    {
        $request->validate([
            'sub_title'         => 'nullable|string|max:255',
            'title'             => 'nullable|string|max:255',
            'icon'              => 'nullable|string|max:255',
            'card_title'        => 'nullable|string|max:255',
            'card_description'  => 'nullable|string',
        ]);

        Excellence::create([
            'sub_title'         => $request->sub_title,
            'title'             => $request->title,
            'icon'              => $request->icon,
            'card_title'        => $request->card_title,
            'card_description'  => $request->card_description,
            'is_active'         => (int) $request->is_active,
        ]);

        return redirect()
            ->route('excellence.index')
            ->with('success', 'Excellence section created successfully.');
    }

    public function show($id)
    {
        $excellence = Excellence::findOrFail($id);
        return view('admin.pages.excellence.show', compact('excellence'));
    }

    // Show edit form
    public function edit($id)
    {
        $excellence = Excellence::findOrFail($id);
        return view('admin.pages.excellence.edit', compact('excellence'));
    }

    // Update the Excellence section
    public function update(Request $request, $id)
    {
        $excellence = Excellence::findOrFail($id);

        $request->validate([ 
            'sub_title'         => 'nullable|string|max:255',
            'title'             => 'nullable|string|max:255',
            'icon'              => 'nullable|string|max:255',
            'card_title'        => 'nullable|string|max:255',
            'card_description'  => 'nullable|string',
        ]);

        $excellence->update([
            'sub_title'         => $request->sub_title,
            'title'             => $request->title,
            'icon'              => $request->icon,
            'card_title'        => $request->card_title,
            'card_description'  => $request->card_description,
            'is_active'         => (int) $request->is_active,
        ]);

        return redirect()
            ->route('excellence.index')
            ->with('success', 'Excellence section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $excellence = Excellence::findOrFail($id);
        $excellence->delete();

        return redirect()->route('excellence.index')->with('success', 'Excellence section deleted successfully.');
    }
}

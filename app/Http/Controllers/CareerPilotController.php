<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerPilot;

class CareerPilotController extends Controller
{
    // Show all career pilot sections
    public function index()
    {
        $career_pilots = CareerPilot::get();
        return view('admin.pages.career_pilot.index', compact('career_pilots'));
    }

    // Show form to create a new career pilot section
    public function create()
    {
        return view('admin.pages.career_pilot.create');
    }

    // Store new career pilot section
    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'nullable|string|max:255',
            'description'      => 'nullable|string',
            'card_title'       => 'nullable|string|max:255',
            'card_description' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/home-page/career_pilot/';
            $fileName = $this->uploadImage($request->file('image'), $path);
            $imagePath = $path . $fileName;
        }

        CareerPilot::create([
            'title'            => $request->title,
            'description'      => $request->description,
            'card_title'       => $request->card_title,
            'card_description' => $request->card_description,
            'image'            => $imagePath,
            'is_active'        => $request->has('is_active'),
        ]);

        return redirect()
            ->route('career_pilot.index')
            ->with('success', 'Career Pilot section created successfully.');
    }

    public function show($id)
    {
        $career_pilot = CareerPilot::findOrFail($id);
        return view('admin.pages.career_pilot.show', compact('career_pilot'));
    }

    // Show edit form
    public function edit($id)
    {
        $career_pilot = CareerPilot::findOrFail($id);
        return view('admin.pages.career_pilot.edit', compact('career_pilot'));
    }

    // Update the career pilot section
    public function update(Request $request, $id)
    {
        $career_pilot = CareerPilot::findOrFail($id);

        $request->validate([ 
            'title'            => 'nullable|string|max:255',
            'description'      => 'nullable|string',
            'card_title'       => 'nullable|string|max:255',
            'card_description' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $imagePath = $career_pilot->image;

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/home-page/career_pilot/';
            $fileName = $this->uploadImage($request->file('image'), $path);
            $imagePath = $path . $fileName;
        }

        $career_pilot->update([
            'title'            => $request->title,
            'description'      => $request->description,
            'card_title'       => $request->card_title,
            'card_description' => $request->card_description,
            'image'            => $imagePath,
            'is_active'        => $request->is_active,
        ]);

        return redirect()
            ->route('career_pilot.index')
            ->with('success', 'Career Pilot section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $career_pilot = CareerPilot::findOrFail($id);
        $career_pilot->delete();

        return redirect()->route('career_pilot.index')->with('success', 'Career Pilot section deleted successfully.');
    }

    // Image upload helper
    private function uploadImage($file, $path)
    {
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName); 
            return $fileName;
        }
        return null;
    }
}

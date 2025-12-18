<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    /** Display all facilities */
    public function index()
    {
        $facilities = Facility::latest()->get();
        return view('admin.pages.facilities.index', compact('facilities'));
    }

    /** Show create form */
    public function create()
    {
        return view('admin.pages.facilities.create');
    }

    /** Store facility */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('admin-assets/facility-page'), $imageName);

        $facility = Facility::create([
            'heading' => $request->heading,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('facilities.index')->with('success', 'Facility added successfully.');
    }

    /** Show a single facility */
    public function show($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.pages.facilities.show', compact('facility'));
    }

    /** Edit form */
    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.pages.facilities.edit', compact('facility'));
    }

    /** Update facility */
    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Handle image replacement
        if ($request->hasFile('image')) {
            if ($facility->image && File::exists(public_path('admin-assets/facility-page/' . $facility->image))) {
                File::delete(public_path('admin-assets/facility-page/' . $facility->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin-assets/facility-page'), $imageName);
            $facility->image = $imageName;
        }

        $facility->update([
            'heading' => $request->heading,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully.');
    }

    /** Delete facility */
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        if ($facility->image && File::exists(public_path('admin-assets/facility-page/' . $facility->image))) {
            File::delete(public_path('admin-assets/facility-page/' . $facility->image));
        }

        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully.');
    }
}

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
        $facilities = Facility::get();
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
            'note'              => 'nullable|string|max:255',
            'heading'           => 'nullable|string|max:255',
            'facility_url'      => 'required|string|max:255|unique:facilities,facility_url',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features'          => 'nullable|array',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('admin-assets/facility-page'), $imageName);
        }

        Facility::create([
            'note'              => $request->note,
            'heading'           => $request->heading,
            'facility_url'      => $request->facility_url,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'image'             => $imageName,
            'features'          => $request->features ?? [],
            'is_active'         => $request->is_active ?? 0,
        ]);

        return redirect()->route('facilities.index')
            ->with('success', 'Facility added successfully.');
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
            'note'              => 'nullable|string|max:255',
            'heading'           => 'nullable|string|max:255',
            'facility_url'      => 'required|string|max:255|unique:facilities,facility_url,' . $id,
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features'          => 'nullable|array',
        ]);

        // Image replace
        if ($request->hasFile('image')) {
            if ($facility->image && file_exists(public_path('admin-assets/facility-page/'.$facility->image))) {
                unlink(public_path('admin-assets/facility-page/'.$facility->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('admin-assets/facility-page'), $imageName);
            $facility->image = $imageName;
        }

        $facility->update([
            'note'              => $request->note,
            'heading'           => $request->heading,
            'facility_url'      => $request->facility_url,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'features'          => $request->features ?? [],
            'is_active'         => $request->is_active ?? 0,
        ]);

        return redirect()->route('facilities.index')
            ->with('success', 'Facility updated successfully.');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        Facility::findOrFail($id)->delete();

        return redirect()
            ->route('facilities.index')
            ->with('success', 'Facility deleted successfully');
    }
}

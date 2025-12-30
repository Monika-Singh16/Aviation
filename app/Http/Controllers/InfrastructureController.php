<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    // Show all infrastructure sections
    public function index()
    {
        $infrastructures = Infrastructure::get();
        return view('admin.pages.infrastructure.index', compact('infrastructures'));
    }

    // Show form to create a new infrastructure sections
    public function create()
    {
        return view('admin.pages.infrastructure.create');
    }

    // Store new infrastructure sections
    public function store(Request $request)
    {
        $request->validate([
            'sub_title'                   => 'nullable|string|max:255',
            'title'                       => 'nullable|string|max:255',
            'infrastructure_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
            'infrastructure_icon'         => 'nullable|string|max:255',
            'infrastructure_title'        => 'nullable|string|max:255',
            'infrastructure_description'  => 'nullable|string',
            'features'                    => 'nullable|array',
        ]);
        
        $imagePath = null;

        if ($request->hasFile('infrastructure_image')) {
            $path = 'admin-assets/images/home-page/infrastructure/';
            $fileName = $this->uploadImage($request->file('infrastructure_image'), $path);
            $imagePath = $path . $fileName;
        }

        Infrastructure::create([
            'sub_title'                   => $request->sub_title,
            'title'                       => $request->title,
            'infrastructure_image'        => $imagePath, 
            'infrastructure_icon'         => $request->infrastructure_icon,
            'infrastructure_title'        => $request->infrastructure_title,
            'infrastructure_description'  => $request->infrastructure_description,
            'features'                    => $request->features,
            'is_active'                   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('infrastructure.index')
            ->with('success', 'infrastructure section created successfully.');
    }

    public function show($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        return view('admin.pages.infrastructure.show', compact('infrastructure'));
    }

    // Show edit form
    public function edit($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        return view('admin.pages.infrastructure.edit', compact('infrastructure'));
    }

    // Update the infrastructure section
    public function update(Request $request, $id)
    {
        $infrastructure = Infrastructure::findOrFail($id);

        $request->validate([ 
            'sub_title'                   => 'nullable|string|max:255',
            'title'                       => 'nullable|string|max:255',
            'infrastructure_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
            'infrastructure_icon'         => 'nullable|string|max:255',
            'infrastructure_title'        => 'nullable|string|max:255',
            'infrastructure_description'  => 'nullable|string',
            'features'                    => 'nullable|array',
        ]);

        $path = 'admin-assets/images/home-page/infrastructure/';
        $imageName = $infrastructure->infrastructure_image;

        if ($request->hasFile('infrastructure_image')) {
            $newImage = $this->uploadImage($request->file('infrastructure_image'), $path); 
            $imageName = $path . $newImage;
        }

        $infrastructure->update([
            'sub_title'                   => $request->sub_title,
            'title'                       => $request->title,
            'infrastructure_image'        => $imageName, 
            'infrastructure_icon'         => $request->infrastructure_icon,
            'infrastructure_title'        => $request->infrastructure_title,
            'infrastructure_description'  => $request->infrastructure_description,
            'features'                    => $request->features,
            'is_active'                   => $request->is_active,
        ]);

        return redirect()
            ->route('infrastructure.index')
            ->with('success', 'infrastructure section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        $infrastructure->delete();

        return redirect()->route('infrastructure.index')->with('success', 'infrastructure section deleted successfully.');
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

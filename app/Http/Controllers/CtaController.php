<?php

namespace App\Http\Controllers;

use App\Models\Cta;
use Illuminate\Http\Request;

class CtaController extends Controller
{
    // Show all cta sections
    public function index()
    {
        $ctas = Cta::get();
        return view('admin.pages.cta.index', compact('ctas'));
    }

    // Show form to create a new cta section
    public function create()
    {
        return view('admin.pages.cta.create');
    }

    // Store new cta section
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/cta/';
        $fileName = $this->uploadImage($request->file('image'), $path); 

        Cta::create([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image'       => $path . $fileName,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()->route('cta.index')->with('success', 'cta section created successfully.');
    }

    public function show($id)
    {
        $cta = Cta::findOrFail($id);
        return view('admin.pages.cta.show', compact('cta'));
    }

    // Show edit form
    public function edit($id)
    {
        $cta = Cta::findOrFail($id);
        return view('admin.pages.cta.edit', compact('cta'));
    }

    // Update the cta section
    public function update(Request $request, $id)
    {
        $cta = Cta::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/cta/';
        $imageName = $cta->image;

        if ($request->hasFile('image')) {
            $newImage = $this->uploadImage($request->file('image'), $path); 
            $imageName = $path . $newImage;
        }

        $cta->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image'       => $imageName,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('cta.index')->with('success', 'Cta section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $cta = Cta::findOrFail($id);
        $cta->delete();

        return redirect()->route('cta.index')->with('success', 'Cta section deleted successfully.');
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

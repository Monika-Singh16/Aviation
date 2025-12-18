<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    // Show all testimonial sections
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.pages.testimonial.index', compact('testimonials'));
    }

    // Show form to create a new testimonial sections
    public function create()
    {
        return view('admin.pages.testimonial.create');
    }

    // Store new testimonial sections
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'description'      => 'required|string',
            'image'            => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/home-page/testimonial/';
            $fileName = $this->uploadImage($request->file('image'), $path);
            $imagePath = $path . $fileName;
        }

        Testimonial::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imagePath,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('testimonial.index')
            ->with('success', 'Testimonial section created successfully.');
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.pages.testimonial.show', compact('testimonial'));
    }

    // Show edit form
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.pages.testimonial.edit', compact('testimonial'));
    }

    // Update the testimonial section
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([ 
            'name'        => 'required|string|max:255',
            'description'  => 'required|string',
            'image'        => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/testimonial/';
        $imageName = $testimonial->image;

        if ($request->hasFile('image')) {
            $newImage = $this->uploadImage($request->file('image'), $path); 
            $imageName = $path . $newImage;
        }

        $testimonial->update([
            'name'         => $request->name, 
            'description'  => $request->description,
            'image'        => $imageName,
            'is_active'    => $request->is_active,
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial section deleted successfully.');
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

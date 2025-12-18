<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhyChoose;

class WhyChooseController extends Controller
{
    // Show all why choose sections
    public function index()
    {
        $why_chooses = WhyChoose::latest()->get();
        return view('admin.pages.why_choose.index', compact('why_chooses'));
    }

    // Show form to create a new why choose section
    public function create()
    {
        return view('admin.pages.why_choose.create');
    }

    // Store new why choose section

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $path = 'admin-assets/images/home-page/why_choose/';
            $fileName = $this->uploadImage($request->file('image'), $path);
            $imagePath = $path . $fileName;
        }

        WhyChoose::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('why_choose.index')
            ->with('success', 'Why Choose section created successfully.');
    }

    public function show($id)
    {
        $why_choose = WhyChoose::findOrFail($id);
        return view('admin.pages.why_choose.show', compact('why_choose'));
    }

    // Show edit form
    public function edit($id)
    {
        $why_choose = WhyChoose::findOrFail($id);
        return view('admin.pages.why_choose.edit', compact('why_choose'));
    }

    // Update the why choose section
    public function update(Request $request, $id)
    {
        $why_choose = WhyChoose::findOrFail($id);

        $request->validate([ 
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'image'        => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/why_choose/';
        $imageName = $why_choose->image;

        if ($request->hasFile('image')) {
            $newImage = $this->uploadImage($request->file('image'), $path); 
            $imageName = $path . $newImage;
        }

        $why_choose->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'image'        => $imageName,
            'is_active'    => $request->is_active,
        ]);

        return redirect()->route('why_choose.index')->with('success', 'Why Choose section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $why_choose = WhyChoose::findOrFail($id);
        $why_choose->delete();

        return redirect()->route('why_choose.index')->with('success', 'Why Choose section deleted successfully.');
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

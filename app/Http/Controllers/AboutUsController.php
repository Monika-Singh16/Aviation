<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutUsController extends Controller
{
    // Show all About records
    public function index()
    {
        $abouts = About::get();
        return view('admin.pages.about.index', compact('abouts'));
    }

    // Show form to create a new About
    public function create()
    {
        return view('admin.pages.about.create');
    }

    // Store new About record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description_1' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_one' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_two' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_three' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description_2' => 'nullable|string',
            'features' => 'required|array',
            'features.*' => 'string',
        ]);

        $path = public_path('admin-assets/images/home-page/about/');

        $mainImage = $this->uploadImage($request->file('image'), $path);
        $imageOne = $this->uploadImage($request->file('image_one'), $path);
        $imageTwo = $this->uploadImage($request->file('image_two'), $path);
        $imageThree = $this->uploadImage($request->file('image_three'), $path);

        About::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description_1' => $request->description_1,
            'image' => $mainImage,
            'image_one' => $imageOne,
            'image_two' => $imageTwo,
            'image_three' => $imageThree,
            'description_2' => $request->description_2,
            'features' => $request->features,
        ]);

        return redirect()->route('admin.pages.about.index')->with('success', 'About section created successfully.');
    }

    // Show single About record
    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('admin.pages.about.show', compact('about'));
    }

    // Edit About record
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.pages.about.edit', compact('about'));
    }

    // Update About record
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description_1' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_one' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_two' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_three' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description_2' => 'nullable|string',
            'features' => 'required|array',
            'features.*' => 'string',
        ]);

        $path = public_path('admin-assets/images/home-page/about/');

        // Replace images if new ones uploaded
        if ($request->hasFile('image')) {
            $about->image = $this->uploadImage($request->file('image'), $path);
        }
        if ($request->hasFile('image_one')) {
            $about->image_one = $this->uploadImage($request->file('image_one'), $path);
        }
        if ($request->hasFile('image_two')) {
            $about->image_two = $this->uploadImage($request->file('image_two'), $path);
        }
        if ($request->hasFile('image_three')) {
            $about->image_three = $this->uploadImage($request->file('image_three'), $path);
        }

        $about->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description_1' => $request->description_1,
            'description_2' => $request->description_2,
            'features' => $request->features,
        ]);

        return redirect()->route('about.index')->with('success', 'About section updated successfully.');
    }

    // Delete About record
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About section deleted successfully.');
    }

    // Private helper for image upload
    private function uploadImage($file, $path)
    {
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            return 'admin-assets/images/home-page/about/' . $fileName;
        }
        return null;
    }
}

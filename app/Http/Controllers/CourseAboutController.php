<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseAbout;

class CourseAboutController extends Controller
{
    // Show all course about sections
    public function index()
    {
        $course_abouts = CourseAbout::latest()->get();
        return view('admin.pages.course_about.index', compact('course_abouts'));
    }

    // Show form to create a new course about section
    public function create()
    {
        return view('admin.pages.course_about.create');
    }

    // Store new course about section
    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'image_1'          => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2'          => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3'          => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/course_about/';

        $image_1 = $this->uploadImage($request->file('image_1'), $path);
        $image_2 = $this->uploadImage($request->file('image_2'), $path);
        $image_3 = $this->uploadImage($request->file('image_3'), $path);

        CourseAbout::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image_1'     => $image_1 ? $path.$image_1 : null,
            'image_2'     => $image_2 ? $path.$image_2 : null,
            'image_3'     => $image_3 ? $path.$image_3 : null,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()->route('course_about.index')->with('success', 'Course About section created successfully.');
    }

    public function show($id)
    {
        $course_about = CourseAbout::findOrFail($id);
        return view('admin.pages.course_about.show', compact('course_about'));
    }

    // Show edit form
    public function edit($id)
    {
        $course_about = CourseAbout::findOrFail($id);
        return view('admin.pages.course_about.edit', compact('course_about'));
    }

    // Update the course about section
    public function update(Request $request, $id)
    {
        $course_about = CourseAbout::findOrFail($id);

        $request->validate([ 
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'image_1'          => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
            'image_2'          => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3'          => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = 'admin-assets/images/home-page/course_about/';

        // keep old images
        $image_1 = $course_about->image_1;
        $image_2 = $course_about->image_2;
        $image_3 = $course_about->image_3;

        // upload new images only if user uploads
        if ($request->hasFile('image_1')) {
            $new = $this->uploadImage($request->file('image_1'), $path);
            $image_1 = $path . $new;
        }

        if ($request->hasFile('image_2')) {
            $new = $this->uploadImage($request->file('image_2'), $path);
            $image_2 = $path . $new;
        }

        if ($request->hasFile('image_3')) {
            $new = $this->uploadImage($request->file('image_3'), $path);
            $image_3 = $path . $new;
        }

        $course_about->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image_1'     => $image_1,
            'image_2'     => $image_2,
            'image_3'     => $image_3,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('course_about.index')->with('success', 'Course About section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $course_about = CourseAbout::findOrFail($id);
        $course_about->delete();

        return redirect()->route('course_about.index')->with('success', 'Course About section deleted successfully.');
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();
        return view('admin.pages.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.pages.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255|unique:courses,course_name',
            'course_url'  => 'required|string|max:255|unique:courses,course_url',
            'duration'    => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload Image
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'admin-assets/images/course-page/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin-assets/images/course-page'), $imageName);
        }

        // Create Course
        Course::create([
            'course_name' => $request->course_name,
            'course_url'  => $request->course_url,
            'duration'    => $request->duration,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }


    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.pages.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_url'  => 'required|string|max:255|unique:courses,course_url,' . $id,
            'duration'    => 'nullable|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Old Image
        $imageName = $course->image;

        // Upload New Image
        if ($request->hasFile('image')) {

            if ($course->image && File::exists(public_path($course->image))) {
                File::delete(public_path($course->image));
            }

            $image = $request->file('image');
            $imageName = 'admin-assets/images/course-page/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin-assets/images/course-page'), $imageName);
        }

        // Update Data
        $course->update([
            'course_name' => $request->course_name,
            'course_url'  => $request->course_url,
            'duration'    => $request->duration,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }


    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.pages.courses.show', compact('course'));
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->image && File::exists(public_path($course->image))) {
            File::delete(public_path($course->image));
        }
        
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}

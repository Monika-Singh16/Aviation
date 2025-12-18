<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoursePhase;
use App\Models\Course;

use Illuminate\Support\Facades\File;

class CoursePhaseController extends Controller
{
    public function index()
    {
        $coursePhases = CoursePhase::latest()->get();
        return view('admin.pages.course-phases.index', compact('coursePhases'));
    }

    public function create(Request $request)
    {
         $courses = Course::latest()->get();
         $selectedCourseId = $request->query('course_id');
        return view('admin.pages.course-phases.create', compact('courses', 'selectedCourseId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'admin-assets/images/course-page/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin-assets/images/course-page'), $imageName);
        }

        CoursePhase::create([
            'course_id' => $request->course_id,
            'heading' => $request->heading,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('course_phases.index')->with('success', 'Course Phase added successfully!');
    }

    public function edit($id)
    {
        $coursePhase = CoursePhase::findOrFail($id);
         $courses = Course::latest()->get();
        return view('admin.pages.course-phases.edit', compact('coursePhase','courses'));
    }

    public function update(Request $request, $id)
    {
        $coursePhase = CoursePhase::findOrFail($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $coursePhase->image;
        if ($request->hasFile('image')) {
            if ($coursePhase->image && File::exists(public_path($coursePhase->image))) {
                File::delete(public_path($coursePhase->image));
            }

            $image = $request->file('image');
            $imageName = 'admin-assets/images/course-page/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin-assets/images/course-page'), $imageName);
        }

        $coursePhase->update([
            'course_id' => $request->course_id,
            'heading' => $request->heading,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('course_phases.index')->with('success', 'Course Phase updated successfully!');
    }

    public function show($id)
    {
        $coursePhase = CoursePhase::findOrFail($id);
        return view('admin.pages.course-phases.show', compact('coursePhase'));
    }

    public function destroy($id)
    {
        $coursePhase = CoursePhase::findOrFail($id);

        if ($coursePhase->image && File::exists(public_path($coursePhase->image))) {
            File::delete(public_path($coursePhase->image));
        }

        $coursePhase->delete();

        return redirect()->route('course_phases.index')->with('success', 'Course Phase deleted successfully!');
    }
}

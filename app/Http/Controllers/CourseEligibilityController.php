<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseEligibility;

class CourseEligibilityController extends Controller
{
    public function index()
    {
        $courseEligibilities = CourseEligibility::latest()->get();
        return view('admin.pages.course-eligibilities.index', compact('courseEligibilities'));
    }

    public function create(Request $request)
    {
         $courses = Course::latest()->get();
         $selectedCourseId = $request->query('course_id');
        return view('admin.pages.course-eligibilities.create',compact('courses', 'selectedCourseId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|array',
        ]);

        CourseEligibility::create([
            'course_id' => $request->course_id,
            'heading' => $request->heading,
            'description' => $request->description,
            'value' => $request->value,
        ]);

        return redirect()->route('course_eligibilities.index')->with('success', 'Course Eligibility added successfully!');
    }

    public function edit($id)
    {
        $courseEligibility = CourseEligibility::findOrFail($id);
        $courses = Course::latest()->get();
        return view('admin.pages.course-eligibilities.edit', compact('courseEligibility','courses'));
    }

    public function update(Request $request, $id)
    {
        $courseEligibility = CourseEligibility::findOrFail($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|array',
        ]);

        $courseEligibility->update([
            'course_id' => $request->course_id,
            'heading' => $request->heading,
            'description' => $request->description,
            'value' => $request->value,
        ]);

        return redirect()->route('course_eligibilities.index')->with('success', 'Course Eligibility updated successfully!');
    }

    public function show($id)
    {
        $courseEligibility = CourseEligibility::findOrFail($id);
        return view('admin.pages.course-eligibilities.show', compact('courseEligibility'));
    }

    public function destroy($id)
    {
        $courseEligibility = CourseEligibility::findOrFail($id);
        $courseEligibility->delete();

        return redirect()->route('course_eligibilities.index')->with('success', 'Course Eligibility deleted successfully!');
    }
}

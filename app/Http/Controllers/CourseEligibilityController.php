<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEligibility;
use Illuminate\Http\Request;

class CourseEligibilityController extends Controller
{
    public function index()
    {
        $courseEligibilities = CourseEligibility::with('course')->get();
        return view('admin.pages.course-eligibilities.index', compact('courseEligibilities'));
    }

    public function create(Request $request)
    {
        $courses = Course::get();
        $selectedCourseId = $request->query('course_id');

        return view(
            'admin.pages.course-eligibilities.create',
            compact('courses', 'selectedCourseId')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'     => 'required|exists:courses,id',
            'eligibilities' => 'required|array',
        ]);

        CourseEligibility::create([
            'course_id'     => $request->course_id,
            'eligibilities' => $request->eligibilities,
            'is_active'     => $request->has('is_active'),
        ]);

        return redirect()
            ->route('course_eligibilities.index')
            ->with('success', 'Course Eligibility added successfully!');
    }

    public function edit($id)
    {
        $courseEligibility = CourseEligibility::findOrFail($id);
        $courses = Course::get();

        return view(
            'admin.pages.course-eligibilities.edit',
            compact('courseEligibility', 'courses')
        );
    }

    public function update(Request $request, $id)
    {
        $courseEligibility = CourseEligibility::findOrFail($id);

        $request->validate([
            'course_id'     => 'required|exists:courses,id',
            'eligibilities' => 'required|array',
            'is_active'     => 'nullable|boolean',
        ]);

        $courseEligibility->update([
            'course_id'     => $request->course_id,
            'eligibilities' => $request->eligibilities,
            'is_active'     => $request->is_active,
        ]);

        return redirect()
            ->route('course_eligibilities.index')
            ->with('success', 'Course Eligibility updated successfully!');
    }

    public function show($id)
    {
        $courseEligibility = CourseEligibility::with('course')->findOrFail($id);
        return view('admin.pages.course-eligibilities.show', compact('courseEligibility'));
    }

    public function destroy($id)
    {
        CourseEligibility::findOrFail($id)->delete();

        return redirect()
            ->route('course_eligibilities.index')
            ->with('success', 'Course Eligibility deleted successfully!');
    }
}

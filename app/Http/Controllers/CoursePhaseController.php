<?php

namespace App\Http\Controllers;

use App\Models\CoursePhase;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursePhaseController extends Controller
{
    public function index()
    {
        $coursePhases = CoursePhase::latest()->get();
        return view('admin.pages.course-phases.index', compact('coursePhases'));
    }

    public function create()
    {
        $courses = Course::latest()->get();
        return view('admin.pages.course-phases.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'      => 'required|exists:courses,id',
            'heading'        => 'required|string|max:255',
            'title'          => 'required|string|max:255',
            'icon'           => 'required|string|max:255',
            'stat_icon'      => 'nullable|string|max:255',
            'description'    => 'required|string',
            'desc'           => 'required|string',
            'features'       => 'nullable|array',
            'stats'          => 'nullable|array',
        ]);

        CoursePhase::create([
            'course_id'      => $request->course_id,
            'heading'        => $request->heading,
            'title'          => $request->title,
            'icon'           => $request->icon,
            'stat_icon'      => $request->stat_icon,
            'description'    => $request->description,
            'desc'           => $request->desc,
            'features'       => $request->features,
            'stats'          => $request->stats,
            'is_active'      => $request->has('is_active'),
        ]);

        return redirect()
            ->route('course_phases.index')
            ->with('success', 'Course Phase added successfully!');
    }

    public function show($id)
    {
        $coursePhase = CoursePhase::findOrFail($id);
        return view('admin.pages.course-phases.show', compact('coursePhase'));
    }

    public function edit($id)
    {
        $coursePhase = CoursePhase::findOrFail($id);
        $courses = Course::latest()->get();

        return view('admin.pages.course-phases.edit', compact('coursePhase', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $coursePhase = CoursePhase::findOrFail($id);

        $request->validate([
            'course_id'     => 'required|exists:courses,id',
            'heading'       => 'required|string|max:255',
            'title'         => 'required|string|max:255',
            'icon'          => 'required|string|max:255',
            'stat_icon'     => 'nullable|string|max:255',
            'description'   => 'required|string',
            'desc'          => 'required|string',
            'features'      => 'nullable|array',
            'stats'         => 'nullable|array',
        ]);

        $coursePhase->update([
            'course_id'     => $request->course_id,
            'heading'       => $request->heading,
            'title'         => $request->title,
            'icon'          => $request->icon,
            'stat_icon'     => $request->stat_icon,
            'description'   => $request->description,
            'desc'          => $request->desc,
            'features'      => $request->features,
            'stats'         => $request->stats,
            'is_active'     => $request->is_active,
        ]);

        return redirect()
            ->route('course_phases.index')
            ->with('success', 'Course Phase updated successfully!');
    }

    public function destroy($id)
    {
        $coursePhase = CoursePhase::findOrFail($id);
        $coursePhase->delete();

        return redirect()
            ->route('course_phases.index')
            ->with('success', 'Course Phase deleted successfully!');
    }
}

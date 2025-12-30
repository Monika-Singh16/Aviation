<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SelectionProcess;
use Illuminate\Http\Request;

class SelectionProcessController extends Controller
{
    public function index()
    {
        $selectionProcesses = SelectionProcess::get();
        return view('admin.pages.selection-processes.index', compact('selectionProcesses'));
    }

    public function create(Request $request)
    {
        $courses = Course::get();
        $selectedCourseId = $request->query('course_id');

        return view(
            'admin.pages.selection-processes.create',
            compact('courses', 'selectedCourseId')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'  => 'required|exists:courses,id',
            'heading'    => 'nullable|string|max:255',
            'criteria'   => 'nullable|array',
            'note'       => 'nullable|string|max:255',
        ]);

        SelectionProcess::create([
            'course_id' => $request->course_id,
            'heading'   => $request->heading,
            'criteria'  => $request->criteria,
            'note'      => $request->note,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('selection_processes.index')
            ->with('success', 'Selection Process added successfully!');
    }

    public function show($id)
    {
        $selectionProcess = SelectionProcess::with('course')->findOrFail($id);
        return view('admin.pages.selection-processes.show', compact('selectionProcess'));
    }

    public function edit($id)
    {
        $selectionProcess = SelectionProcess::findOrFail($id);
        $courses = Course::get();

        return view(
            'admin.pages.selection-processes.edit',
            compact('selectionProcess', 'courses')
        );
    }

    public function update(Request $request, $id)
    {
        $selectionProcess = SelectionProcess::findOrFail($id);

        $request->validate([
            'course_id'  => 'required|exists:courses,id',
            'heading'    => 'nullable|string|max:255',
            'criteria'   => 'nullable|array',
            'note'       => 'nullable|string|max:255',
            'is_active'  => 'required|boolean',
        ]);

        $selectionProcess->update([
            'course_id' => $request->course_id,
            'heading'   => $request->heading,
            'criteria'  => $request->criteria,
            'note'      => $request->note,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('selection_processes.index')
            ->with('success', 'Selection Process updated successfully!');
    }

    public function destroy($id)
    {
        SelectionProcess::findOrFail($id)->delete();

        return redirect()
            ->route('selection_processes.index')
            ->with('success', 'Selection Process deleted successfully!');
    }
}

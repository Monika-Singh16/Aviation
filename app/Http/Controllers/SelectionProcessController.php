<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\SelectionProcess;

class SelectionProcessController extends Controller
{
    public function index()
    {
        $selectionProcesses = SelectionProcess::latest()->get();
        return view('admin.pages.selection-processes.index', compact('selectionProcesses'));
    }

    public function create(Request $request)
    {
         $courses = Course::latest()->get();
         $selectedCourseId = $request->query('course_id');
        return view('admin.pages.selection-processes.create',compact('courses', 'selectedCourseId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|array',
        ]);

        SelectionProcess::create([
            'course_id' => $request->course_id,
            'heading' => $request->heading,
            'description' => $request->description,
            'value' => $request->value,
        ]);

        return redirect()->route('selection_processes.index')->with('success', 'Selection Process added successfully!');
    }

    public function edit($id)
    {
        $selectionProcess = SelectionProcess::findOrFail($id);
         $courses = Course::latest()->get();
        return view('admin.pages.selection-processes.edit', compact('selectionProcess', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $selectionProcess = SelectionProcess::findOrFail($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|array',
        ]);

        $selectionProcess->update([
            'course_id' => $request->course_id,
            'heading' => $request->heading,
            'description' => $request->description,
            'value' => $request->value,
        ]);

        return redirect()->route('selection_processes.index')->with('success', 'Selection Process updated successfully!');
    }

    public function show($id)
    {
        $selectionProcess = SelectionProcess::findOrFail($id);
        return view('admin.pages.selection-processes.show', compact('selectionProcess'));
    }

    public function destroy($id)
    {
        $selectionProcess = SelectionProcess::findOrFail($id);
        $selectionProcess->delete();

        return redirect()->route('selection_processes.index')->with('success', 'Selection Process deleted successfully!');
    }
}

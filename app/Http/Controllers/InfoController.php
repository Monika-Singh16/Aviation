<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Course;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of infos.
     */
    public function index()
    {
        $infos = Info::with('course')->get();
        return view('admin.pages.infos.index', compact('infos'));
    }

    /**
     * Show the form for creating a new info.
     */
    public function create(Request $request)
    {
        $courses = Course::get();
        $selectedCourseId = $request->query('course_id');

        return view('admin.pages.infos.create', compact('courses', 'selectedCourseId'));
    }

    /**
     * Store a newly created info in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Info::create([
            'course_id'   => $request->course_id,
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('infos.index')
            ->with('success', 'Info added successfully');
    }

    /**
     * Display the specified info.
     */
    public function show($id)
    {
        $info = Info::with('course')->findOrFail($id);
        return view('admin.pages.infos.show', compact('info'));
    }

    /**
     * Show the form for editing the specified info.
     */
    public function edit($id)
    {
        $info = Info::findOrFail($id);
        $courses = Course::get();

        return view('admin.pages.infos.edit', compact('info', 'courses'));
    }

    /**
     * Update the specified info in storage.
     */
    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);

        $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'icon'        => 'nullable|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $info->update([
            'course_id'   => $request->course_id,
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
            'is_active'   => $request->is_active,
        ]);

        return redirect()
            ->route('infos.index')
            ->with('success', 'Info updated successfully');
    }

    /**
     * Remove the specified info from storage.
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        $info->delete();

        return redirect()
            ->route('infos.index')
            ->with('success', 'Info deleted successfully');
    }
}

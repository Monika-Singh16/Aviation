<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseAbout;

class CourseAboutController extends Controller
{
    public function course_about($id)
    {
        $course_about = CourseAbout::where('course_id', $id)->first();

        if (!$course_about) {
            abort(404, 'Course About not found');
        }

        return view('pages.course', compact('course_about'));
    }
    
    // ✅ INDEX: 1 COURSE = 1 ROW
    public function index()
    {
        $course_abouts = CourseAbout::get();
        return view('admin.pages.course_about.index', compact('course_abouts'));
    }

    // ✅ CREATE FORM (COURSES LIST)
    public function create(Request $request)
    {
        $courses = Course::select('id', 'course_name')->get();
        return view('admin.pages.course_about.create', compact('courses'));
    }

    // ✅ STORE (ONLY ONE COURSE ABOUT PER COURSE)
    public function store(Request $request)
    {
        
        $request->validate([
            'course_id'   => 'required|exists:courses,id|unique:course_abouts,course_id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image_1'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = public_path('admin-assets/images/home-page/course_about/');

        $image_1 = $this->uploadImage($request->file('image_1'), $path);
        $image_2 = $this->uploadImage($request->file('image_2'), $path);
        $image_3 = $this->uploadImage($request->file('image_3'), $path);

        CourseAbout::create([
            'course_id'   => $request->course_id,
            'title'       => $request->title,
            'description' => $request->description,
            'image_1'     => $image_1 ? 'admin-assets/images/home-page/course_about/'.$image_1 : null,
            'image_2'     => $image_2 ? 'admin-assets/images/home-page/course_about/'.$image_2 : null,
            'image_3'     => $image_3 ? 'admin-assets/images/home-page/course_about/'.$image_3 : null,
            'is_active'   => $request->is_active ?? 0,
        ]);

        return redirect()->route('course_about.index')
            ->with('success', 'Course About added successfully');
    }

    public function show($id)
    {
        $course_about = CourseAbout::findOrFail($id);
        return view('admin.pages.course_about.show', compact('course_about'));
    }

    // ✅ EDIT
    public function edit($id)
    {
        $course_about = CourseAbout::findOrFail($id);
        return view('admin.pages.course_about.edit', compact('course_about'));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $course_about = CourseAbout::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image_1'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $path = public_path('admin-assets/images/home-page/course_about/');

        // Keep old images
        $image_1 = $course_about->image_1;
        $image_2 = $course_about->image_2;
        $image_3 = $course_about->image_3;

        // Replace only if new file uploaded
        if ($request->hasFile('image_1')) {
            // Optional: delete old image
            if ($image_1 && file_exists(public_path($image_1))) {
                unlink(public_path($image_1));
            }
            $image_1 = 'admin-assets/images/home-page/course_about/'.$this->uploadImage($request->file('image_1'), $path);
        }

        if ($request->hasFile('image_2')) {
            if ($image_2 && file_exists(public_path($image_2))) {
                unlink(public_path($image_2));
            }
            $image_2 = 'admin-assets/images/home-page/course_about/'.$this->uploadImage($request->file('image_2'), $path);
        }

        if ($request->hasFile('image_3')) {
            if ($image_3 && file_exists(public_path($image_3))) {
                unlink(public_path($image_3));
            }
            $image_3 = 'admin-assets/images/home-page/course_about/'.$this->uploadImage($request->file('image_3'), $path);
        }

        $course_about->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image_1'     => $image_1,
            'image_2'     => $image_2,
            'image_3'     => $image_3,
            'is_active'   => $request->is_active ?? 0,
        ]);

        return redirect()->route('course_about.index')
            ->with('success', 'Course About updated successfully');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        CourseAbout::findOrFail($id)->delete();

        return redirect()->route('course_about.index')
            ->with('success', 'Course About deleted successfully');
    }

    // 🔧 IMAGE UPLOAD HELPER
    private function uploadImage($file, $path)
    {
        if (!$file) return null;

        $fileName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move($path, $fileName);
        return $fileName;
    }
}

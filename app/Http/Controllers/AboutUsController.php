<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\File;
class AboutUsController extends Controller
{
    // Show all About records
    public function index()
    {
        $abouts = About::get();
        return view('admin.pages.about.index', compact('abouts'));
    }

    // Show form to create a new About
    public function create()
    {
        return view('admin.pages.about.create');
    }

    // Store new About record
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title'         => 'required|string|max:255',
    //         'sub_title'     => 'required|string|max:255',
    //         'description'   => 'required|string',
    //         'image_one'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'image_two'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'features'      => 'required|array',
    //     ]);

    //     $path = public_path('admin-assets/images/home-page/about/');

    //     $imageOne = $this->uploadImage($request->file('image_one'), $path);
    //     $imageTwo = $this->uploadImage($request->file('image_two'), $path);

    //     About::create([
    //         'title'       => $request->title,
    //         'sub_title'   => $request->sub_title,
    //         'description' => $request->description,
    //         'image_one'   => $imageOne,
    //         'image_two'   => $imageTwo,
    //         'features'    => $request->features,
    //         'is_active'   => $request->has('is_active'), 
    //     ]);

    //     return redirect()
    //         ->route('about.index')
    //         ->with('success', 'About section created successfully.');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title'   => 'nullable|string|max:255',
            'description' => 'required|string',
            'image_one'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_two'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'features'    => 'required|array|min:1',
        ]);

        $path = public_path('admin-assets/images/home-page/about/');

        $imageOne = $this->uploadImage($request->file('image_one'), $path);
        $imageTwo = $this->uploadImage($request->file('image_two'), $path);

        About::create([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image_one'   => $imageOne,
            'image_two'   => $imageTwo,
            'features'    => $request->features,
            'is_active'   => $request->is_active ?? 0,
        ]);

        return redirect()
            ->route('about.index')
            ->with('success', 'About section created successfully.');
    }


    // Show single About record
    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('admin.pages.about.show', compact('about'));
    }

    // Edit About record
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.pages.about.edit', compact('about'));
    }

    // Update About record
    // public function update(Request $request, $id)
    // {
    //     $about = About::findOrFail($id);

    //     $request->validate([
    //         'title'         => 'required|string|max:255',
    //         'sub_title'     => 'required|string|max:255',
    //         'description'   => 'required|string',
    //         'image_one'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'image_two'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'features'      => 'required|array',
    //     ]);

    //     $path = public_path('admin-assets/images/home-page/about/');

    //     // Replace images if new ones uploaded
    //     if ($request->hasFile('image_one')) {
    //         $about->image_one = $this->uploadImage($request->file('image_one'), $path);
    //     }
    //     if ($request->hasFile('image_two')) {
    //         $about->image_two = $this->uploadImage($request->file('image_two'), $path);
    //     }

    //     $about->update([
    //         'title'         => $request->title,
    //         'sub_title'     => $request->sub_title,
    //         'description'   => $request->description,
    //         'features'      => $request->features,
    //         'image_one'     => $imageOne,
            
    //     ]);

    //     return redirect()->route('about.index')->with('success', 'About section updated successfully.');
    // }
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'title'         => 'required|string|max:255',
            'sub_title'     => 'nullable|string|max:255',
            'description'   => 'required|string',
            'image_one'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_two'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'features'      => 'required|array',
        ]);

        $path = public_path('admin-assets/images/home-page/about/');

        /** Image One */
        if ($request->hasFile('image_one')) {
            if ($about->image_one && File::exists(public_path($about->image_one))) {
                File::delete(public_path($about->image_one));
            }
            $about->image_one = $this->uploadImage($request->file('image_one'), $path);
        }

        /** Image Two */
        if ($request->hasFile('image_two')) {
            if ($about->image_two && File::exists(public_path($about->image_two))) {
                File::delete(public_path($about->image_two));
            }
            $about->image_two = $this->uploadImage($request->file('image_two'), $path);
        }

        $about->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'features'    => $request->features,
            'is_active'   => $request->is_active,
        ]);

        return redirect()
            ->route('about.index')
            ->with('success', 'About section updated successfully.');
    }

    // Delete About record
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About section deleted successfully.');
    }

    // Private helper for image upload
    private function uploadImage($file, $path)
    {
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            return 'admin-assets/images/home-page/about/' . $fileName;
        }
        return null;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutPage;

class AboutPageController extends Controller
{
    // Show all about page sections
    public function index()
    {
        $about_pages = AboutPage::get();
        return view('admin.pages.about_page.index', compact('about_pages'));
    }

    // Show form to create a new about page section
    public function create()
    {
        return view('admin.pages.about_page.create');
    }

    // Store new about page section
    public function store(Request $request)
    {
        $request->validate([
            'banner_image'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'about_image'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title'         => 'required|string|max:255',
            'heading'       => 'required|string|max:255',
            'description'   => 'required|string',
            'sub_title'     => 'required|string|max:255',
            'number'        => 'required|string',
        ]);

        $path = 'admin-assets/images/home-page/about_page/';

        $bannerImage = $this->uploadImage($request->file('banner_image'), $path);
        $aboutImage  = $this->uploadImage($request->file('about_image'), $path);

        AboutPage::create([
            'banner_image' => $path . $bannerImage,
            'about_image'  => $path . $aboutImage,
            'title'        => $request->title,
            'heading'      => $request->heading,
            'description'  => $request->description,
            'sub_title'    => $request->sub_title,
            'number'       => $request->number,
            'is_active'    => $request->has('is_active'),
        ]);

        return redirect()
            ->route('about_page.index')
            ->with('success', 'About Page section created successfully.');
    }
    
    // Show Form
    public function show($id)
    {
        $about_page = AboutPage::findOrFail($id);
        return view('admin.pages.about_page.show', compact('about_page'));
    }

    // Show edit form
    public function edit($id)
    {
        $about_page = AboutPage::findOrFail($id);
        return view('admin.pages.about_page.edit', compact('about_page'));
    }

    // Update the About Page section
    public function update(Request $request, $id)
    {
        $about_page = AboutPage::findOrFail($id);

        $request->validate([ 
            'banner_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'about_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title'         => 'required|string|max:255',
            'heading'       => 'required|string|max:255',
            'description'   => 'required|string',
            'sub_title'     => 'required|string|max:255',
            'number'        => 'required|string', 
        ]);

        $path = 'admin-assets/images/home-page/about_page/';

        $bannerImage = $about_page->banner_image;
        $aboutImage  = $about_page->about_image;

        if ($request->hasFile('banner_image')) {
            $bannerImage = $path . $this->uploadImage($request->file('banner_image'), $path);
        }

        if ($request->hasFile('about_image')) {
            $aboutImage = $path . $this->uploadImage($request->file('about_image'), $path);
        }

        $about_page->update([
            'banner_image' => $bannerImage,
            'about_image'  => $aboutImage,
            'title'        => $request->title,
            'heading'      => $request->heading,
            'description'  => $request->description,
            'sub_title'    => $request->sub_title,
            'number'       => $request->number,
            'is_active'    => $request->is_active,
        ]);

        return redirect()
            ->route('about_page.index')
            ->with('success', 'About Page section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $about_page = AboutPage::findOrFail($id);
        $about_page->delete();

        return redirect()->route('about_page.index')->with('success', 'About Page section deleted successfully.');
    }

    // Image upload helper
    private function uploadImage($file, $path)
    {
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName); 
            return $fileName;
        }
        return null;
    }
}

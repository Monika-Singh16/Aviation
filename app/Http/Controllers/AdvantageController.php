<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advantage;

class AdvantageController extends Controller
{
    // Show all advantage sections
    public function index()
    {
        $advantages = Advantage::get();
        return view('admin.pages.advantage.index', compact('advantages'));
    }

    // Show form to create a new advantage section
    public function create(Request $request)
    {
        return view('admin.pages.advantage.create');
    }

    // Store new advantage section
    public function store(Request $request)
    {
        $request->validate([
            'sub_title'         => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'banner_image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ratings'           => 'required|array',
            'is_active'         => 'nullable|boolean',
        ]);

        // 🔹 Convert ratings to key-value JSON
        $ratings = [];
        if ($request->ratings) {
            foreach ($request->ratings as $item) {
                if (!empty($item['key'])) {
                    $ratings[$item['key']] = $item['value'] ?? '';
                }
            }
        }

        $path = 'admin-assets/images/home-page/advantage/';

        $bannerImage = $this->uploadImage($request->file('banner_image'), $path);

        Advantage::create([
            'sub_title'         => $request->sub_title,
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'banner_image'      => $path . $bannerImage,
            'ratings'           => $ratings,
            'is_active'         => $request->is_active ? 1 : 0,
        ]);

        return redirect()
            ->route('advantage.index')
            ->with('success', 'Advantages added successfully!');
    }

    // Show Form
    public function show($id)
    {
        $advantage = Advantage::findOrFail($id);
        return view('admin.pages.advantage.show', compact('advantage'));
    }

    // show edit form
    public function edit($id)
    {
        $advantage= Advantage::findOrFail($id);
        return view('admin.pages.advantage.edit', compact('advantage'));
    }

    // Update the Advantage Section
    public function update(Request $request, $id)
    {
        $advantage = Advantage::findOrFail($id);

        $request->validate([
            'sub_title'         => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'banner_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ratings'           => 'required|array',
        ]);

        // 🔹 Convert ratings to key-value JSON
        $ratings = [];
        if ($request->ratings) {
            foreach ($request->ratings as $item) {
                if (!empty($item['key'])) {
                    $ratings[$item['key']] = $item['value'] ?? '';
                }
            }
        }

        $path = 'admin-assets/images/home-page/advantage/';

        $bannerImage = $advantage->banner_image;

        if ($request->hasFile('banner_image')) {
            $bannerImage = $path . $this->uploadImage($request->file('banner_image'), $path);
        }

        $advantage->update([
            'sub_title'         => $request->sub_title,
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'banner_image'      => $bannerImage,
            'ratings'           => $ratings,
            'is_active'         => $request->is_active ? 1 : 0,
        ]);

        return redirect()
            ->route('advantage.index')
            ->with('success', 'Advantages updated successfully!');
    }

    // Delete Record
    public function destroy($id)
    {
        $advantage = Advantage::findOrFail($id);
        $advantage->delete();

        return redirect()
            ->route('advantage.index')->with('success', 'Advantage deleted successfully!');
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

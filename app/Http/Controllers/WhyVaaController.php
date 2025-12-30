<?php

namespace App\Http\Controllers;

use App\Models\WhyVaa;
use Illuminate\Http\Request;

class WhyVaaController extends Controller
{
    public function index()
    {
        $whyvaa = WhyVaa::get();
        return view('admin.pages.whyvaa.index', compact('whyvaa'));
    }

    public function create()
    {
        return view('admin.pages.whyvaa.create');
    }
    
    public function store(Request $request)
    {
       $request->validate([
            'main_title'             => 'nullable|string|max:255',
            'main_desc'              => 'nullable|string',
            'image'                  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_title'            => 'required|string|max:255',
            'image_sub_title'        => 'required|string|max:255',
            'image_sub_description'  => 'required|string',
        ]);

        $path = 'admin-assets/images/home-page/whyvaa/';
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = $this->uploadImage($request->file('image'), $path);
        }

        WhyVaa::create([
            'main_title'            => $request->main_title,
            'main_desc'             => $request->main_desc,
            'image'                 => $fileName ? $path . $fileName : null,
            'image_title'           => $request->image_title,
            'image_sub_title'       => $request->image_sub_title,
            'image_sub_description' => $request->image_sub_description,
            'is_active'             => $request->has('is_active'),
        ]); 

        //return $data;

        return redirect()->route('whyvaa.index')
                        ->with('success', 'Section created successfully.');
    }

    public function show($id)
    {
        $whyvaa = WhyVaa::findOrFail($id);
        return view('admin.pages.whyvaa.show', compact('whyvaa'));
    }

    public function edit($id)
    {
        $whyvaa = WhyVaa::findOrFail($id);
        return view('admin.pages.whyvaa.edit', compact('whyvaa'));
    }

    public function update(Request $request, $id)
    {
        $whyvaa = WhyVaa::findOrFail($id);

        $request->validate([
            'main_title'             => 'nullable|string|max:255',
            'main_desc'              => 'nullable|string',
            'image'                  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_title'            => 'required|string|max:255',
            'image_sub_title'        => 'required|string|max:255',
            'image_sub_description'  => 'required|string',
        ]);

        $path = 'admin-assets/images/home-page/whyvaa/';
        $imageName = $whyvaa->image;

        if ($request->hasFile('image')) {
            $newImage = $this->uploadImage($request->file('image'), $path);
            $imageName = $path . $newImage;
        }

        $whyvaa->update([
            'main_title'            => $request->main_title,
            'main_desc'             => $request->main_desc,
            'image'                 => $imageName,
            'image_title'           => $request->image_title,
            'image_sub_title'       => $request->image_sub_title,
            'image_sub_description' => $request->image_sub_description,
            'is_active'             => $request->is_active,
        ]);

        return redirect()->route('whyvaa.index')
                         ->with('success', 'Section updated successfully.');
    }

    public function destroy($id)
    {
        $whyvaa = WhyVaa::findOrFail($id);
        $whyvaa->delete();

        return redirect()->route('whyvaa.index')
                         ->with('success', 'Section deleted successfully.');
    }

    private function uploadImage($file, $path)
    {
        if ($file) {
            $destination = public_path($path);
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $fileName);
            return $fileName;
        }
        return null;
    }
}

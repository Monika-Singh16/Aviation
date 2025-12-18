<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        //return $galleries;
        return view('admin.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = public_path('admin-assets/images/home-page/gallery/');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        foreach ($request->file('images') as $image) {

            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $fileName);

            // 🔥 EACH IMAGE = NEW ROW = NEW ID
            Gallery::create([
                'images' => 'admin-assets/images/home-page/gallery/' . $fileName,
            ]);
        }

        return redirect()
            ->route('gallery.index')
            ->with('success', 'Gallery images uploaded successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // delete image file
        if ($gallery->images && File::exists(public_path($gallery->images))) {
            File::delete(public_path($gallery->images));
        }

        // delete DB row
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery image deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    // Show all hero sections
    public function index()
    {
        $heros = Hero::get();
        return view('admin.pages.hero.index', compact('heros'));
    }

    // Show form to create a new hero section
    public function create()
    {
        return view('admin.pages.hero.create');
    }

    // Store new hero section
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/hero/';
        $fileName = $this->uploadImage($request->file('image'), $path); 

        Hero::create([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image'       => $path . $fileName,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()->route('hero.index')->with('success', 'Hero section created successfully.');
    }

    public function show($id)
    {
        $hero = Hero::findOrFail($id);
        return view('admin.pages.hero.show', compact('hero'));
    }

    // Show edit form
    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        return view('admin.pages.hero.edit', compact('hero'));
    }

    // Update the hero section
    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title'   => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/hero/';
        $imageName = $hero->image;

        if ($request->hasFile('image')) {
            $newImage = $this->uploadImage($request->file('image'), $path); 
            $imageName = $path . $newImage;
        }

        $hero->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image'       => $imageName,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('hero.index')->with('success', 'Hero section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);
        $hero->delete();

        return redirect()->route('hero.index')->with('success', 'Hero section deleted successfully.');
    }

    // Image upload helper
    private function uploadImage($file, $path)
    {
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName); // path without public_path
            return $fileName;
        }
        return null;
    }
}

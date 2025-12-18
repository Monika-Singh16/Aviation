<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    public function index()
    {
        $highlights = Highlight::all();
        return view('admin.pages.highlights.index', compact('highlights'));
    }

    public function create()
    {
        return view('admin.pages.highlights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'heading' => 'required|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
            'short_description' => 'required|string',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('admin-assets/images/home-page/highlights'), $imageName);

        Highlight::create([
            'icon' => $request->icon,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'short_description' => $request->short_description,
            'label' => $request->label ?? [],
            'value' => $request->value ?? [],
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imageName,
            'description' => $request->description,
            'label_1' => $request->label_1 ?? [],
            'value_1' => $request->value_1 ?? [],
            'features' => $request->features ?? [],
            'color' => $request->color,
        ]);

        return redirect()->route('highlights.index')->with('success', 'Highlight created successfully.');
    }

    public function edit($id)
    {
        $highlight = Highlight::findOrFail($id);
        return view('admin.pages.highlights.edit', compact('highlight'));
    }

    public function update(Request $request, $id)
    {
        $highlight = Highlight::findOrFail($id);

        $request->validate([
            'icon' => 'required|string',
            'heading' => 'required|string|max:255',
            'short_description' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $highlight->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin-assets/images/home-page/highlights'), $imageName);
        }

        $highlight->update([
            'icon' => $request->icon,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'short_description' => $request->short_description,
            'label' => $request->label ?? [],
            'value' => $request->value ?? [],
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imageName,
            'description' => $request->description,
            'label_1' => $request->label_1 ?? [],
            'value_1' => $request->value_1 ?? [],
            'features' => $request->features ?? [],
            'color' => $request->color,
        ]);

        return redirect()->route('highlights.index')->with('success', 'Highlight updated successfully.');
    }

    public function destroy($id)
    {
        $highlight = Highlight::findOrFail($id);
        $highlight->delete();
        return redirect()->route('highlights.index')->with('success', 'Highlight deleted successfully.');
    }

    public function show($id)
    {
        $highlight = Highlight::findOrFail($id);
        return view('admin.pages.highlights.show', compact('highlight'));
    }
}

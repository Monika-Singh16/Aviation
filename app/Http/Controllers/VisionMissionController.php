<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisionMission;

class VisionMissionController extends Controller
{
    // Show all vision mission sections
    public function index()
    {
        $vision_missions = VisionMission::latest()->get();
        return view('admin.pages.vision_mission.index', compact('vision_missions'));
    }

    // Show form to create a new vision mission section
    public function create()
    {
        return view('admin.pages.vision_mission.create');
    }

    // Store new vision mission section
    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'card_1'           => 'required|string|max:255',
            'card_2'           => 'required|string|max:255',
            'card_3'           => 'required|string|max:255',
            'card_4'           => 'required|string|max:255',
            'image'            => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/vision_mission/';
        $fileName = $this->uploadImage($request->file('image'), $path); 

        VisionMission::create([
            'title'       => $request->title,
            'description' => $request->description,
            'card_1'      => $request->card_1,
            'card_2'      => $request->card_2,
            'card_3'      => $request->card_3,
            'card_4'      => $request->card_4,
            'image'       => $path . $fileName,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()->route('vision_mission.index')->with('success', 'Vision Mission section created successfully.');
    }

    public function show($id)
    {
        $vision_mission = VisionMission::findOrFail($id);
        return view('admin.pages.vision_mission.show', compact('vision_mission'));
    }

    // Show edit form
    public function edit($id)
    {
        $vision_mission = VisionMission::findOrFail($id);
        return view('admin.pages.vision_mission.edit', compact('vision_mission'));
    }

    // Update the vision mission section
    public function update(Request $request, $id)
    {
        $vision_mission = VisionMission::findOrFail($id);

        $request->validate([ 
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'card_1'       => 'required|string|max:255',
            'card_2'       => 'required|string|max:255',
            'card_3'       => 'required|string|max:255',
            'card_4'       => 'required|string|max:255',
            'image'        => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
        ]);

        $path = 'admin-assets/images/home-page/vision_mission/';
        $imageName = $vision_mission->image;

        if ($request->hasFile('image')) {
            $newImage = $this->uploadImage($request->file('image'), $path); 
            $imageName = $path . $newImage;
        }

        $vision_mission->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'card_1'       => $request->card_1,
            'card_2'       => $request->card_2,
            'card_3'       => $request->card_3,
            'card_4'       => $request->card_4,
            'image'        => $imageName,
            'is_active'    => $request->is_active,
        ]);

        return redirect()->route('vision_mission.index')->with('success', 'Vision Mission section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $vision_mission = VisionMission::findOrFail($id);
        $vision_mission->delete();

        return redirect()->route('vision_mission.index')->with('success', 'Vision Mission section deleted successfully.');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aircraft;
use App\Models\Facility;
use Illuminate\Support\Facades\File;

class AircraftController extends Controller
{
    public function index()
    {
        $aircrafts = Aircraft::with('facility')->get();
        return view('admin.pages.aircraft.index', compact('aircrafts'));
    }

    public function create()
    {
        $facilities = Facility::where('is_active', 1)->get();
        return view('admin.pages.aircraft.create', compact('facilities'));
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'facility_id' => 'required|exists:facilities,id',
            'desc'        => 'required|string',
            'features'    => 'required|array',
            'is_active'   => 'nullable|boolean',
        ]);

        $features = [];
        $path = 'admin-assets/images/home-page/aircraft';

        if ($request->features) {
            foreach ($request->features as $key => $feature) {

                $imgPath = null;

                if (isset($feature['image'])) {
                    $image     = $feature['image'];
                    $imageName = uniqid().'_'.$image->getClientOriginalName();
                    $image->move(public_path($path), $imageName);
                    $imgPath = $path.'/'.$imageName;
                }

                $features[$key] = [
                    'icon'        => $feature['icon'] ?? null,
                    'title'       => $feature['title'] ?? null,
                    'description' => $feature['description'] ?? null,
                    'image'       => $imgPath,
                ];
            }
        }

        Aircraft::create([
            'title'       => $request->title,
            'facility_id' => $request->facility_id,
            'desc'        => $request->desc,
            'features'    => json_encode($features),
            'is_active'   => $request->is_active ?? 1,
        ]);

        return redirect()->route('aircraft.index')->with('success', 'Aircraft created successfully');
    }

    public function show($id)
    {
        $aircraft = Aircraft::with('facility')->findOrFail($id);
        return view('admin.pages.aircraft.show', compact('aircraft'));
    }

    public function edit($id)
    {
        $aircraft   = Aircraft::findOrFail($id);
        $facilities = Facility::where('is_active', 1)->get();

        return view('admin.pages.aircraft.edit', compact('aircraft', 'facilities'));
    }

    /**
     * UPDATE
     */
    public function update(Request $request, $id)
    {
        $aircraft = Aircraft::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'facility_id' => 'required|exists:facilities,id',
            'desc'        => 'required|string',
            'features'    => 'required|array',
            'is_active'   => 'nullable|boolean',
        ]);

        $oldFeatures = json_decode($aircraft->features, true) ?? [];
        $features = [];
        $path = 'admin-assets/images/home-page/aircraft';

        foreach ($request->features as $key => $feature) {

            $imgPath = $oldFeatures[$key]['image'] ?? null;

            if (isset($feature['image'])) {

                // delete old image
                if ($imgPath && File::exists(public_path($imgPath))) {
                    File::delete(public_path($imgPath));
                }

                $image     = $feature['image'];
                $imageName = uniqid().'_'.$image->getClientOriginalName();
                $image->move(public_path($path), $imageName);
                $imgPath = $path.'/'.$imageName;
            }

            $features[$key] = [
                'icon'        => $feature['icon'] ?? null,
                'title'       => $feature['title'] ?? null,
                'description' => $feature['description'] ?? null,
                'image'       => $imgPath,
            ];
        }

        $aircraft->update([
            'title'       => $request->title,
            'facility_id' => $request->facility_id,
            'desc'        => $request->desc,
            'features'    => json_encode($features),
            'is_active'   => $request->is_active ?? 1,
        ]);

        return redirect()->route('aircraft.index')->with('success', 'Aircraft updated successfully');
    }

    public function destroy($id)
    {
        $aircraft = Aircraft::findOrFail($id);
        $aircraft->delete();

        return redirect()->route('aircraft.index')->with('success', 'Aircraft deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\FacilityHero;
use App\Models\Facility;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class FacilityHeroController extends Controller
{
    /** 🔹 List all heroes */
    public function index()
    {
        $heroes = FacilityHero::get();
        return view('admin.pages.facility_hero.index', compact('heroes'));
    }

    /** 🔹 Show create form */
    public function create()
    {
        $facilities = Facility::get();
        return view('admin.pages.facility_hero.create', compact('facilities'));
    }

    /** 🔹 Store hero */
    public function store(Request $request)
    {
        $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'heading'     => 'nullable|string|max:255',
            'desc'        => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'stat'        => 'required|array',
            'is_active'   => 'boolean'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin-assets/facility-hero'), $imageName);
        }

        FacilityHero::create([
            'facility_id' => $request->facility_id, 
            'heading'     => $request->heading,
            'desc'        => $request->desc,
            'image'       => $imageName,
            'stat'        => $request->stat,
            'is_active'   => $request->has('is_active'),
        ]);

        return redirect()
            ->route('facility_hero.index')
            ->with('success', 'Facility Hero added successfully');
    }

    /** 🔹 Show single hero */
    public function show($id)
    {
        $hero = FacilityHero::findOrFail($id);
        return view('admin.pages.facility_hero.show', compact('hero'));
    }

    /** 🔹 Show edit form */
    public function edit($id)
    {
        $hero = FacilityHero::findOrFail($id);
        $facilities = Facility::get();

        return view(
            'admin.pages.facility_hero.edit',
            compact('hero', 'facilities')
        );
    }

    /** 🔹 Update hero */
    public function update(Request $request, $id)
    {
        $hero = FacilityHero::findOrFail($id);

        $request->validate([
            'heading'     => 'nullable|string|max:255',
            'desc'        => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'facility_id' => 'required|exists:facilities,id|unique:facility_hero,facility_id,' . $hero->id,
            'stat'        => 'nullable|array',
        ]);

        // ✅ Keep old image by default
        $imageName = $hero->image;

        // ✅ Upload new image
        if ($request->hasFile('image')) {

            // Delete old image
            if ($hero->image && file_exists(public_path('admin-assets/facility-hero/' . $hero->image))) {
                unlink(public_path('admin-assets/facility-hero/' . $hero->image));
            }

            // Save new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(
                public_path('admin-assets/facility-hero'),
                $imageName
            );
        }

        $hero->update([
            'heading'     => $request->heading,
            'desc'        => $request->desc,
            'facility_id' => $request->facility_id,
            'image'       => $imageName,
            'stat'        => $request->stat ?? [],
            'is_active'   => $request->is_active ?? 1,
        ]);

        return redirect()
            ->route('facility_hero.index')
            ->with('success', 'Facility Hero updated successfully');
    }

        /** 🔴 Delete facility hero */
    public function destroy($id)
    {
        $hero = FacilityHero::findOrFail($id);

        // 🔹 Delete image if exists
        if (
            $hero->image &&
            file_exists(public_path('admin-assets/images/home-page/facility-hero' . $hero->image))
        ) {
            unlink(public_path('admin-assets/images/home-page/facility-hero' . $hero->image));
        }

        $hero->delete();

        return redirect()
            ->route('facility-hero.index')
            ->with('success', 'Facility Hero deleted successfully');
    }

}

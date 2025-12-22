<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicFeature;

class AcademicFeatureController extends Controller
{
    // Show all Academic Feature sections
    public function index()
    {
        $academic_features = AcademicFeature::orderBy('sort_order')->get();
        return view('admin.pages.academic_feature.index', compact('academic_features'));
    }

    // Show form to create a new Academic Feature section
    public function create()
    {
        return view('admin.pages.academic_feature.create');
    }

    // Store new Academic Feature section
    public function store(Request $request)
    {
        $data = $request->validate([
            'sub_title'      => 'nullable|string|max:255',
            'title'          => 'nullable|string|max:255',

            'vihanga_type'   => 'required|in:boolean,text',
            'vihanga_bool'   => 'nullable|boolean',
            'vihanga_text'   => 'nullable|string|max:255',

            'other_type'     => 'required|in:boolean,text',
            'other_bool'     => 'nullable|boolean',
            'other_text'     => 'nullable|string|max:255',

            'sort_order'     => 'nullable|integer|min:0',
            'is_active'      => 'nullable|boolean',
        ]);

        // 🔹 Clean Vihanga values
        if ($data['vihanga_type'] === 'boolean') {
            $data['vihanga_text'] = null;
            $data['vihanga_bool'] = $request->vihanga_bool ?? false;
        } else {
            $data['vihanga_bool'] = null;
        }

        // 🔹 Clean Other Academy values
        if ($data['other_type'] === 'boolean') {
            $data['other_text'] = null;
            $data['other_bool'] = $request->other_bool ?? false;
        } else {
            $data['other_bool'] = null;
        }

        AcademicFeature::create($data);

        return redirect()
            ->route('academic_feature.index')
            ->with('success', 'Academic Feature section created successfully.');
    }

    // Show single record
    public function show($id)
    {
        $academic_feature = AcademicFeature::findOrFail($id);
        return view('admin.pages.academic_feature.show', compact('academic_feature'));
    }

    // Show edit form
    public function edit($id)
    {
        $academic_feature = AcademicFeature::findOrFail($id);
        return view('admin.pages.academic_feature.edit', compact('academic_feature'));
    }

    // Update Academic Feature section
    public function update(Request $request, $id)
    {
        $academic_feature = AcademicFeature::findOrFail($id);

        $data = $request->validate([
            'sub_title'      => 'nullable|string|max:255',
            'title'          => 'nullable|string|max:255',

            'vihanga_type'   => 'required|in:boolean,text',
            'vihanga_bool'   => 'nullable|boolean',
            'vihanga_text'   => 'nullable|string|max:255',

            'other_type'     => 'required|in:boolean,text',
            'other_bool'     => 'nullable|boolean',
            'other_text'     => 'nullable|string|max:255',

            'sort_order'     => 'nullable|integer|min:0',
            'is_active'      => 'nullable|boolean',
        ]);

        // 🔹 Clean Vihanga values
        if ($data['vihanga_type'] === 'boolean') {
            $data['vihanga_text'] = null;
            $data['vihanga_bool'] = $request->vihanga_bool ?? false;
        } else {
            $data['vihanga_bool'] = null;
        }

        // 🔹 Clean Other Academy values
        if ($data['other_type'] === 'boolean') {
            $data['other_text'] = null;
            $data['other_bool'] = $request->other_bool ?? false;
        } else {
            $data['other_bool'] = null;
        }

        $academic_feature->update($data);

        return redirect()
            ->route('academic_feature.index')
            ->with('success', 'Academic Feature section updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $academic_feature = AcademicFeature::findOrFail($id);
        $academic_feature->delete();

        return redirect()
            ->route('academic_feature.index')
            ->with('success', 'Academic Feature section deleted successfully.');
    }
}
?>
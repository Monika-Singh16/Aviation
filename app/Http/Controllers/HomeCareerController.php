<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeCareer;

class HomeCareerController extends Controller
{
     public function index()
    {
        $homeCareers = HomeCareer::all();
        return view('admin.pages.homecareer.index', compact('homeCareers'));
    }

    public function create()
    {
        return view('admin.pages.homecareer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'label' => 'nullable|array',
            'label.*' => 'string',
            'value' => 'nullable|array',
            'value.*' => 'string',
        ]);

        $data = $request->all();

        if (isset($data['label'])) {
            $data['label'] = json_encode($data['label']);
        }
        if (isset($data['value'])) {
            $data['value'] = json_encode($data['value']);
        }

        HomeCareer::create($data);

        return redirect()->route('homecareer.index')
            ->with('success', 'Home Career created successfully.');
    }

    public function show($id)
    {
        $homeCareer = HomeCareer::findOrFail($id);
        return view('admin.pages.homecareer.show', compact('homeCareer'));
    }

    public function edit($id)
    {
        $homeCareer = HomeCareer::findOrFail($id);
        return view('admin.pages.homecareer.edit', compact('homeCareer'));
    }

    public function update(Request $request, $id)
    {
        $homeCareer = HomeCareer::findOrFail($id);

        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'label' => 'nullable|array',
            'label.*' => 'string',
            'value' => 'nullable|array',
            'value.*' => 'string',
        ]);

        $data = $request->all();

        if (isset($data['label'])) {
            $data['label'] = json_encode($data['label']);
        }
        if (isset($data['value'])) {
            $data['value'] = json_encode($data['value']);
        }

        $homeCareer->update($data);

        return redirect()->route('homecareer.index')
            ->with('success', 'Home Career updated successfully.');
    }

    public function destroy($id)
    {
        $homeCareer = HomeCareer::findOrFail($id);
        $homeCareer->delete();

        return redirect()->route('homecareer.index')
            ->with('success', 'Home Career deleted successfully.');
    }

}

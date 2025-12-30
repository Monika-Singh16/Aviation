<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::get();
        return view('admin.pages.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.pages.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'key_responsibilities' => 'required|array',
            'key_process' => 'required|array',
            'skills_qualification' => 'required|array',
            'work_experience' => 'required|array',
            'benefits' => 'required|array',
            'date_opened' => 'required|date',
            'job_type' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state_province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_postal_code' => 'required|string|max:255',
        ]);

        Career::create([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'key_responsibilities' => $request->key_responsibilities,
            'key_process' => $request->key_process,
            'skills_qualification' => $request->skills_qualification,
            'work_experience' => $request->work_experience,
            'benefits' => $request->benefits,
            'date_opened' => $request->date_opened,
            'job_type' => $request->job_type,
            'industry' => $request->industry,
            'salary' => $request->salary,
            'city' => $request->city,
            'state_province' => $request->state_province,
            'country' => $request->country,
            'zip_postal_code' => $request->zip_postal_code,
        ]);

        return redirect()->route('careers.index')->with('success', 'Career added successfully!');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.pages.careers.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'key_responsibilities' => 'required|array',
            'key_process' => 'required|array',
            'skills_qualification' => 'required|array',
            'work_experience' => 'required|array',
            'benefits' => 'required|array',

            'date_opened' => 'required|date',
            'job_type' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state_province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_postal_code' => 'required|string|max:255',
        ]);

        $career->update([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'key_responsibilities' => $request->key_responsibilities,
            'key_process' => $request->key_process,
            'skills_qualification' => $request->skills_qualification,
            'work_experience' => $request->work_experience,
            'benefits' => $request->benefits,
            'date_opened' => $request->date_opened,
            'job_type' => $request->job_type,
            'industry' => $request->industry,
            'salary' => $request->salary,
            'city' => $request->city,
            'state_province' => $request->state_province,
            'country' => $request->country,
            'zip_postal_code' => $request->zip_postal_code,
        ]);

        return redirect()->route('careers.index')->with('success', 'Career updated successfully!');
    }

    public function show($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.pages.careers.show', compact('career'));
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('careers.index')->with('success', 'Career deleted successfully!');
    }
}

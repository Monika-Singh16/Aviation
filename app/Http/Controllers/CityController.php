<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\State;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('state')->get();
        return view('admin.pages.cities.index', compact('cities'));
    }

    public function create()
    {
        $states = State::where('is_active', 1)->get();
        return view('admin.pages.cities.create', compact('states'));
    }   

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'name'     => 'required|string|max:255',
        ]);

        City::create([
            'state_id'  => $request->state_id,
            'name'      => $request->name,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }

    // public function edit($id)
    // {
    //     $city = City::findOrFail($id);
    //     return view('admin.pages.cities.edit', compact('city'));
    // }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        $states = State::where('is_active', 1)->get();
        return view('admin.pages.cities.edit', compact('city', 'states'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'name'     => 'required|string|max:255',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'state_id'  => $request->state_id,
            'name'      => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }

    public function show($id)
    {
        $city = City::with('state')->findOrFail($id);
        return view('admin.pages.cities.show', compact('city'));
    }
}

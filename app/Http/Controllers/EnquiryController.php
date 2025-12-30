<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
use App\Models\City;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::get();
        return view('admin.pages.enquiries.index', compact('enquiries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'             => 'required|exists:courses,id',
            'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'gender'                => 'nullable|string|in:male,female,other',
            'height'                => 'nullable|numeric',
            'weight'                => 'nullable|numeric',
            'email'                 => 'required|email|max:255',
            'mobile'                => 'required|string|max:20',
            'alternate_mobile'      => 'nullable|string|max:20', 
            'dob'                   => 'required|date',
            'nationality'           => 'nullable|string|max:100',
            'dgca_medical_status'   => 'nullable|string|max:255',
            'educational_status'    => 'nullable|string|max:255',
            'physics_math_12th'     => 'nullable|boolean',
            'state_id'              => 'required|exists:states,id',
            'city_id'               => 'required|exists:cities,id',
            'message'               => 'nullable|string',
        ]);

        Enquiry::create([
            'course_id'             => $request->course_id,
            'first_name'            => $request->first_name,
            'last_name'             => $request->last_name,
            'gender'                => $request->gender,
            'height'                => $request->height,
            'weight'                => $request->weight,
            'email'                 => $request->email,
            'mobile'                => $request->mobile,
            'alternate_mobile'      => $request->alternate_mobile, 
            'dob'                   => $request->dob,
            'nationality'           => $request->nationality,
            'dgca_medical_status'   => $request->dgca_medical_status,
            'educational_status'    => $request->educational_status,
            'physics_math_12th'     => $request->physics_math_12th,
            'state_id'              => $request->state_id,
            'city_id'               => $request->city_id,
            'message'               => $request->message,
        ]);
        return redirect()
            ->route('thank.you')
            ->with('success', 'Enquiry submitted successfully.');
        
    }

    public function getCities($state_id)
    {
        return City::where('state_id', $state_id)->get();
    }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.pages.enquiries.show', compact('enquiry'));
    }

    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        $enquiry->delete();

        return redirect()
            ->route('enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }

}

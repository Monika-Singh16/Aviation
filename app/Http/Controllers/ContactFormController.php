<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function index()
    {
        $contacts = ContactForm::get();
        return view('admin.pages.contact_form.index', compact('contacts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:20',
            'source'    => 'nullable|string|max:255',
            'message'   => 'required|string',
        ]);

        ContactForm::create([
            'course_id' => $request->course_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'source'    => $request->source,
            'message'   => $request->message,
        ]);

        return redirect()
        ->route('thank.you')->with('success', 'Your inquiry has been submitted successfully.');
    }

    // Show single inquiry (Admin)
    public function show(ContactForm $inquiry)
    {
        return view('admin.pages.contact_form.show', compact('inquiry'));
    }
}

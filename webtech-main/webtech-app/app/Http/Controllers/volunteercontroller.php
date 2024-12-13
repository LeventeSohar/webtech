<?php

namespace App\Http\Controllers;
use App\Models\VolunteerApplication;


use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function create()
    {
        return view('volunteer'); // This should be the Blade template for your form
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:volunteer_applications,email',
            'application_text' => 'required|string',
        ]);

        // Store the data in the database
        VolunteerApplication::create($validated);

        // Redirect back with a success message
        return redirect()->route('volunteer.form')->with('success', 'Your application has been submitted successfully!');
    }

}

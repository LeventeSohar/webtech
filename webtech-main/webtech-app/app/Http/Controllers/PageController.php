<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home'); // returns the home view
    }

    public function about()
    {
        return view('about'); // returns the about view
    }

    public function donate()
    {
        return view('donate');
    }

    public function signin()
    {
        return view('signin');
    }

    public function guidelines()
    {
        return view('guidelines');
    }

    public function blog()
    {
        return view('blog');
    }

    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Process the data (e.g., save it to the database)
        // For demonstration, we'll just return a success message
        return back()->with('success', 'Form submitted successfully! Name: ' . $validatedData['name'] . ', Email: ' . $validatedData['email']);
    }
    public function dashboard()
    {
        return view('dashboard');  // This should match your dashboard.blade.php filename
    }
    
}

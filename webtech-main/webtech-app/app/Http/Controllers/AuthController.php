<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the credentials
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate and log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the dashboard upon successful login
            return redirect()->intended('dashboard');
        }

        // Redirect back with an error if authentication fails
        return redirect()->back()->withErrors(['login_error' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function testAuth()
    {
        $admin = \App\Models\Admin::where('name', 'Admin')->first();

        if (!$admin) {
            return 'Admin user not found';
        }

        $passwordToCheck = 'your_password'; // Replace with the actual password you want to check
        $isMatch = \Illuminate\Support\Facades\Hash::check($passwordToCheck, $admin->password);

        if ($isMatch) {
            return 'Authentication works';
        } else {
            return 'Authentication failed';
        }
    }


}

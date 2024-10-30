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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function guidelines()
    {
        return view('guidelines');
    }

    public function donate()
    {
        return view('donate');
    }

    public function home()
    {
        return view('home');
    }

    public function blog()
    {
        return view('home');
    }
}


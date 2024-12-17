<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal; 

class AdoptionController extends Controller
{
    public function index()
    {
        // Fetch all animals
        $animals = Animal::all();

        // Pass the animals to the view
        return view('adoption', compact('animals'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{   
    // for showing list of animals in adopt
    public function adopt()
    {
     $animals = Animal::all(); // Fetch all animals from the database
     return view('adopt.index', compact('animals')); // Return the view for adoption
    }

    /**
     * Display a listing of the resource with optional filters.
     */
    public function index(Request $request)
    {
        //$query = Animal::query();

        // Filtering logic
        //if ($request->has('type')) {
        //    $query->where('type', $request->type);
        //}
        //if ($request->has('size')) {
        //    $query->where('size', $request->size);
        //}
        //if ($request->has('age')) {
        //    $query->where('age', $request->age);
        //}
        //if ($request->has('color')) {
        //    $query->where('color', $request->color);
        //}

        //$animals = $query->get();

        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:dog,cat,rodent',
            'size' => 'nullable|string',
            'age' => 'nullable|integer',
            'color' => 'nullable|string',
            'description' => 'nullable|string',
            'garden_needed' => 'required_if:type,dog|boolean',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('animals', 'public');
        }

        Animal::create($validated);
        return redirect()->route('animals.index')->with('success', 'Whoop whoop, you added an animal!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view('adoption.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'type' => 'required|in:dog,cat,rodent',
            'size' => 'nullable|string',
            'age' => 'nullable|integer',
            'color' => 'nullable|string',
            'description' => 'nullable|string',
            'garden_needed' => 'required_if:type,dog|boolean',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('animals', 'public');
        }

        $animal->update($validated);
        return redirect()->route('animals.index')->with('success', 'Amazing, you updated the animals');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Lovely, another animal found a home!');
    }
}

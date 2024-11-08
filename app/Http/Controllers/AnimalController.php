<?php

namespace App\Http\Controllers;

use App\Models\Animal;  // Make sure to import the Animal model
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
{
    $animals = Animal::all();

    return view('animals.index', compact('animals'));
}

public function create()
{
    return view('animals.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|string',
        'size' => 'nullable|string',
        'age' => 'nullable|integer',
        'color' => 'nullable|string',
        'description' => 'nullable|string',
        'garden_needed' => 'nullable|boolean',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $animal = Animal::create($validated);
    return redirect()->route('animals.index');
}

public function edit(Animal $animal)
{
    return view('animals.edit', compact('animal'));
}

public function update(Request $request, Animal $animal)
{
    $validated = $request->validate([
        'type' => 'required|string',
        'size' => 'nullable|string',
        'age' => 'nullable|integer',
        'color' => 'nullable|string',
        'description' => 'nullable|string',
        'garden_needed' => 'nullable|boolean',
    ]);

    $animal->update($validated);
    return redirect()->route('animals.index');
}

public function destroy(Animal $animal)
{
    $animal->delete();
    return redirect()->route('animals.index');
}

}

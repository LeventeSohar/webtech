<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    // List all animals
    public function index()
    {
        $animals = Animal::all([
            'id', 'name', 'species', 'breed', 'gender', 'date_of_birth', 'date_of_arrival',
            'color', 'weight', 'is_neutered', 'is_vaccinated', 'is_microchipped',
            'microchip_number', 'medical_history', 'special_needs', 'personality_traits',
            'is_adoptable', 'adoption_date', 'adopted_by', 'surrendered_by', 'notes', 'profile_picture'
        ]);
        return response()->json($animals, 200);
    }

    // Show a specific animal
    public function show($id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal not found'], 404);
        }
        return response()->json($animal, 200);
    }

    // Store a new animal
    public function store(Request $request)
    {
        $validatedData = $this->validateAnimal($request);

        // Handle image upload
        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('animals', 'public');
        }

        $animal = Animal::create($validatedData);

        return response()->json($animal, 201);
    }

    // Update an existing animal
    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal not found'], 404);
        }

        $validatedData = $this->validateAnimal($request);

        // Handle image upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($animal->profile_picture) {
                Storage::delete('public/' . $animal->profile_picture);
            }
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('animals', 'public');
        }

        $animal->update($validatedData);

        return response()->json($animal, 200);
    }

    // Delete an animal
    public function destroy($id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal not found'], 404);
        }

        // Delete profile picture from storage if it exists
        if ($animal->profile_picture) {
            Storage::delete('public/' . $animal->profile_picture);
        }

        $animal->delete();

        return response()->json(['message' => 'Animal deleted successfully'], 200);
    }

    // Shared validation logic
    protected function validateAnimal(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'nullable|date',
            'date_of_arrival' => 'required|date',
            'color' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'is_neutered' => 'boolean',
            'is_vaccinated' => 'boolean',
            'is_microchipped' => 'boolean',
            'microchip_number' => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',
            'special_needs' => 'nullable|string',
            'personality_traits' => 'nullable|string',
            'is_adoptable' => 'boolean',
            'adoption_date' => 'nullable|date',
            'adopted_by' => 'nullable|string|max:255',
            'surrendered_by' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}

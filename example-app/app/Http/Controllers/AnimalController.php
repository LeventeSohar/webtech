<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the animals.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $animals = Animal::all(); // Fetch all animals from the database
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new animal.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('animals.create'); // Show the create form
    }
    public function adopt(Request $request)
    {
        //1. (old) without filter - so showing all animals:
        //$animals = Animal::all();
        //dd($animals);
        //dd($animals->first()->created_at);
        
        //3. Not only one condition (type but also when created - 2 conditions combined)
        $query = Animal::query();

        //2. With filter (Hannas individual topic):
        if ($request->filled('type') && $request->input('type') !== '') {
            $query->where('type', $request->input('type'));
        }

        // Handle sorting: 'newest' or 'oldest'
        if ($request->filled('newest') && $request->input('newest') == '1') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->filled('oldest') && $request->input('oldest') == '1') {
            $query->orderBy('created_at', 'asc');
        }


        // Fetch animals with applied filters
        $animals = $query->get();
        
        return view('adopt.index', compact('animals')); // Return the view for adoption
    }

    /**
     * Store a newly created animal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'date_of_arrival' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Handle image upload if there's a file
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            // Store the image in the 'public/animals' directory
            $profilePicturePath = $request->file('profile_picture')->store('animals', 'public');
        }

        // Create a new animal record
        Animal::create([
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'date_of_arrival' => $request->date_of_arrival,
            'color' => $request->color,
            'weight' => $request->weight,
            'is_neutered' => $request->is_neutered ?? false,
            'is_vaccinated' => $request->is_vaccinated ?? false,
            'is_microchipped' => $request->is_microchipped ?? false,
            'microchip_number' => $request->microchip_number,
            'medical_history' => $request->medical_history,
            'special_needs' => $request->special_needs,
            'personality_traits' => $request->personality_traits,
            'is_adoptable' => $request->is_adoptable ?? true,
            'adoption_date' => $request->adoption_date,
            'adopted_by' => $request->adopted_by,
            'surrendered_by' => $request->surrendered_by,
            'notes' => $request->notes,
            'profile_picture' => $profilePicturePath, // Store the image path in the database
        ]);

        // Redirect to the list of animals or a success page
        return redirect()->route('adopt.index')->with('success', 'Animal added successfully!');
    }

    /**
     * Display the specified animal.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function show(Animal $animal)
    {
        return view('adopt.show', compact('animal')); // Show a specific animal's details
    }

    /**
     * Show the form for editing the specified animal.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal')); // Show the edit form for the specific animal
    }

    /**
     * Update the specified animal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Animal $animal)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'date_of_arrival' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);
    /** @var \App\Models\User $user **/
            // Only admin should be able to update admin_comments
    if (auth()->user()->is_admin && $request->has('admin_comments')) {
        $animal->admin_comments = $request->input('admin_comments');
    }

        // Handle image upload if there's a file
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture from storage if it exists
            if ($animal->profile_picture) {
                Storage::delete('public/' . $animal->profile_picture);
            }

            // Store the new image and update the path
            $profilePicturePath = $request->file('profile_picture')->store('animals', 'public');
            $animal->profile_picture = $profilePicturePath;
        }

        // Update the animal record with the new data
        $animal->update([
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'date_of_arrival' => $request->date_of_arrival,
            'color' => $request->color,
            'weight' => $request->weight,
            'is_neutered' => $request->is_neutered ?? false,
            'is_vaccinated' => $request->is_vaccinated ?? false,
            'is_microchipped' => $request->is_microchipped ?? false,
            'microchip_number' => $request->microchip_number,
            'medical_history' => $request->medical_history,
            'special_needs' => $request->special_needs,
            'personality_traits' => $request->personality_traits,
            'is_adoptable' => $request->is_adoptable ?? true,
            'adoption_date' => $request->adoption_date,
            'adopted_by' => $request->adopted_by,
            'surrendered_by' => $request->surrendered_by,
            'notes' => $request->notes,
        ]);

        // Redirect to the animal's details page or a success page
        return redirect()->route('animals.show', $animal)->with('success', 'Animal updated successfully!');
    }

    /**
     * Remove the specified animal from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Animal $animal)
    {
        // Delete the animal's profile picture from storage if it exists
        if ($animal->profile_picture) {
            Storage::delete('public/' . $animal->profile_picture);
        }

        // Delete the animal record
        $animal->delete();

        // Redirect to the list of animals or a success page
        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully!');
    }
}

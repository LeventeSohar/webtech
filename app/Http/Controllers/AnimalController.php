<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{   
    //THIS IS FOR THE VIEW ADOPT !! (working for me - Hanna)

    // 1. for showing list of all animals in adopt 
    public function adopt(Request $request)
    {
        //1. (old) without filter - so showing all animals:
        //$animals = Animal::all();
        
        //3. Not only one condition (type but also when created - 2 conditions combined)
        $query = Animal::query();

        //2. With filter (Hannas individual topic):
        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }

        // Fetch animals with applied filters
        $animals = $query->get();
        
        return view('adopt.index', compact('animals')); // Return the view for adoption
    }

    //Note: Always trouble for some reason (Authentification eventhough shouldnt be needed and neither in blade nor route nor middleware written!)
    // 2. for showing the further details when clicked on "read more"
    public function show(Animal $animal)
    {
        if (!$animal) {
            return abort(404,'Animal not found');
        }

        return view('adopt.show', compact('animal'));
    }
    //No matter what trouble shooting, i ended up getting the same errors: therefore decided to try it a different way
    //Instead of the show.blade.php with its routing, i adjusted the working index.blade.php to include javascript to show the further details
    //that was working and we were supposed to at least have javascript implemented once
    //This took a really long time to set up and error shoot though! Especially since it is not used in the end!

   





    

    //THIS IS FOR THE VIEW ANIMALS!!
    public function index(Request $request)
    {
        
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

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

    //Note: Always trouble for some reason (Authentification eventhough shouldnt be needed and neither in blade nor route nor middleware written!)
    // 2. for showing the further details when clicked on "read more"
    //public function show(Animal $animal)
    //{
        //if (!$animal) {
        //    return abort(404,'Animal not found');
        //}

        //return view('adopt.show', compact('animal'));
    //}
    //No matter what trouble shooting, i ended up getting the same errors: therefore decided to try it a different way
    //Instead of the show.blade.php with its routing, i adjusted the working index.blade.php to include javascript to show the further details
    //that was working and we were supposed to at least have javascript implemented once
    //This took a really long time to set up and error shoot though! Especially since it is not used in the end!
    //I left it in here as a comment to show the work, but deleted the not used show.blade.php and the route to make the project less complex and confusing for the others
};  

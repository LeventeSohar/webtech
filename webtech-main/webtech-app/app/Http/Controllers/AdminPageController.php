<?php

namespace App\Http\Controllers;
use App\Models\VolunteerApplication;
use App\Models\Animal;
use Illuminate\Contracts\View\View;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Animal Management
    public function animalManage()
    {
        $animals = Animal::all();
        return view('admin.animalManage',compact('animals'));
    }

    public function storeAnimal(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'age' => 'nullable|integer',
        'type' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image',
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('animal_images', 'public');
    }

    // Save the animal
    Animal::create($data);

    return redirect()->route('animalManage')->with('success', 'Animal added successfully.');
}

public function deleteAnimal($id)
{
    $animal = Animal::findOrFail($id);
    $animal->delete();

    return redirect()->route('animalManage')->with('success', 'Animal deleted successfully.');
}

    // Volunteer Management
    public function volunteerManage(): View
    {
        $volunteers = VolunteerApplication::all(); // Retrieve all volunteer applications
        return view('admin.volunteerManage', compact('volunteers'));

    }

    public function deleteVolunteer($id)
    {
        $volunteer = VolunteerApplication::findOrFail($id);
        $volunteer->delete();

        return redirect()->route('volunteerManage')->with('success', 'Volunteer application deleted successfully.');
    }


    // Blog Management
    public function blogManage()
    {
        return view('admin.blogManage');
    }

    




}

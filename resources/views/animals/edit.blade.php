@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-semibold mb-6">Edit Animal</h1>

    <form action="{{ route('animals.update', $animal) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow-lg">
        @csrf
        @method('PUT')

        <!-- Animal Name -->
        <div>
            <label for="name" class="block text-gray-700 font-bold">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ $animal->name }}" required>
        </div>

        <!-- Animal Species -->
        <div>
            <label for="species" class="block text-gray-700 font-bold">Species</label>
            <input type="text" name="species" id="species" class="w-full p-2 border rounded" value="{{ $animal->species }}" required>
        </div>

        <!-- Animal Breed -->
        <div>
            <label for="breed" class="block text-gray-700 font-bold">Breed (Optional)</label>
            <input type="text" name="breed" id="breed" class="w-full p-2 border rounded" value="{{ $animal->breed }}">
        </div>

        <!-- Animal Gender -->
        <div>
            <label for="gender" class="block text-gray-700 font-bold">Gender</label>
            <select name="gender" id="gender" class="w-full p-2 border rounded">
                <option value="male" {{ $animal->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $animal->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Date of Birth -->
        <div>
            <label for="date_of_birth" class="block text-gray-700 font-bold">Date of Birth (Optional)</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="w-full p-2 border rounded" value="{{ $animal->date_of_birth }}">
        </div>

        <!-- Date of Arrival -->
        <div>
            <label for="date_of_arrival" class="block text-gray-700 font-bold">Date of Arrival</label>
            <input type="date" name="date_of_arrival" id="date_of_arrival" class="w-full p-2 border rounded" value="{{ $animal->date_of_arrival }}" required>
        </div>

        <!-- Color -->
        <div>
            <label for="color" class="block text-gray-700 font-bold">Color</label>
            <input type="text" name="color" id="color" class="w-full p-2 border rounded" value="{{ $animal->color }}">
        </div>

        <!-- Weight -->
        <div>
            <label for="weight" class="block text-gray-700 font-bold">Weight (kg, Optional)</label>
            <input type="number" name="weight" id="weight" class="w-full p-2 border rounded" value="{{ $animal->weight }}" step="0.1">
        </div>

        <!-- Neutered Status -->
        <div>
            <label class="block text-gray-700 font-bold">Is the animal neutered?</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="is_neutered" value="1" {{ $animal->is_neutered ? 'checked' : '' }}> Yes
                </label>
                <label>
                    <input type="radio" name="is_neutered" value="0" {{ !$animal->is_neutered ? 'checked' : '' }}> No
                </label>
            </div>
        </div>

        <!-- Vaccination Status -->
        <div>
            <label class="block text-gray-700 font-bold">Is the animal vaccinated?</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="is_vaccinated" value="1" {{ $animal->is_vaccinated ? 'checked' : '' }}> Yes
                </label>
                <label>
                    <input type="radio" name="is_vaccinated" value="0" {{ !$animal->is_vaccinated ? 'checked' : '' }}> No
                </label>
            </div>
        </div>

        <!-- Microchip Information -->
        <div>
            <label for="microchip_number" class="block text-gray-700 font-bold">Microchip Number (Optional)</label>
            <input type="text" name="microchip_number" id="microchip_number" class="w-full p-2 border rounded" value="{{ $animal->microchip_number }}">
        </div>

        <!-- Personality Traits -->
        <div>
            <label for="personality_traits" class="block text-gray-700 font-bold">Personality Traits (Optional)</label>
            <textarea name="personality_traits" id="personality_traits" rows="3" class="w-full p-2 border rounded">{{ $animal->personality_traits }}</textarea>
        </div>

        <!-- Special Needs -->
        <div>
            <label for="special_needs" class="block text-gray-700 font-bold">Special Needs (Optional)</label>
            <textarea name="special_needs" id="special_needs" rows="3" class="w-full p-2 border rounded">{{ $animal->special_needs }}</textarea>
        </div>

        <!-- Profile Picture -->
        <div>
            <label for="picture" class="block text-gray-700 font-bold">Profile Picture</label>
            <input type="file" name="picture" id="picture" accept="image/*" class="block w-full text-gray-500">
            @if($animal->picture)
                <img src="{{ asset('storage/' . $animal->picture) }}" alt="Animal Picture" class="w-32 h-auto mt-4 rounded">
            @endif
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

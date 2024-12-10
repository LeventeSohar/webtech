@extends('layouts.base')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-8">Add New Animal</h1>

    
    <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow-lg">
        @csrf

        <!-- Animal Name -->
        <div>
            <label for="name" class="block text-gray-700 font-bold">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <!-- Animal Species -->
        <div>
            <label for="species" class="block text-gray-700 font-bold">Species:</label>
            <input type="text" id="species" name="species" value="{{ old('species') }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <!-- Animal Breed -->
        <div>
            <label for="breed" class="block text-gray-700 font-bold">Breed (Optional):</label>
            <input type="text" id="breed" name="breed" value="{{ old('breed') }}" 
                   class="w-full p-2 border rounded">
        </div>

        <!-- Animal Gender -->
        <div>
            <label for="gender" class="block text-gray-700 font-bold">Gender:</label>
            <select id="gender" name="gender" class="w-full p-2 border rounded">
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Date of Birth -->
        <div>
            <label for="date_of_birth" class="block text-gray-700 font-bold">Date of Birth (Optional):</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" 
                   class="w-full p-2 border rounded">
        </div>

        <!-- Date of Arrival -->
        <div>
            <label for="date_of_arrival" class="block text-gray-700 font-bold">Date of Arrival:</label>
            <input type="date" id="date_of_arrival" name="date_of_arrival" value="{{ old('date_of_arrival') }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <!-- Color -->
        <div>
            <label for="color" class="block text-gray-700 font-bold">Color (Optional):</label>
            <input type="text" id="color" name="color" value="{{ old('color') }}" 
                   class="w-full p-2 border rounded">
        </div>

        <!-- Weight -->
        <div>
            <label for="weight" class="block text-gray-700 font-bold">Weight (kg, Optional):</label>
            <input type="number" id="weight" name="weight" step="0.1" value="{{ old('weight') }}" 
                   class="w-full p-2 border rounded">
        </div>

        <!-- Neutered Status -->
        <div>
            <label class="block text-gray-700 font-bold">Is the animal neutered?</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="is_neutered" value="1" {{ old('is_neutered') == '1' ? 'checked' : '' }}>
                    Yes
                </label>
                <label>
                    <input type="radio" name="is_neutered" value="0" {{ old('is_neutered') == '0' ? 'checked' : '' }}>
                    No
                </label>
            </div>
        </div>

        <!-- Vaccination Status -->
        <div>
            <label class="block text-gray-700 font-bold">Is the animal vaccinated?</label>
            <div class="flex items-center space-x-4">
                <label>
                    <input type="radio" name="is_vaccinated" value="1" {{ old('is_vaccinated') == '1' ? 'checked' : '' }}>
                    Yes
                </label>
                <label>
                    <input type="radio" name="is_vaccinated" value="0" {{ old('is_vaccinated') == '0' ? 'checked' : '' }}>
                    No
                </label>
            </div>
        </div>

        <!-- Microchip Information -->
        <div>
            <label for="microchip_number" class="block text-gray-700 font-bold">Microchip Number (Optional):</label>
            <input type="text" id="microchip_number" name="microchip_number" value="{{ old('microchip_number') }}" 
                   class="w-full p-2 border rounded">
        </div>

        <!-- Personality Traits -->
        <div>
            <label for="personality_traits" class="block text-gray-700 font-bold">Personality Traits (Optional):</label>
            <textarea id="personality_traits" name="personality_traits" rows="3" 
                      class="w-full p-2 border rounded">{{ old('personality_traits') }}</textarea>
        </div>

        <!-- Special Needs -->
        <div>
            <label for="special_needs" class="block text-gray-700 font-bold">Special Needs (Optional):</label>
            <textarea id="special_needs" name="special_needs" rows="3" 
                      class="w-full p-2 border rounded">{{ old('special_needs') }}</textarea>
        </div>

        <!-- Profile Picture -->
        <div>
            <label for="profile_picture" class="block text-gray-700 font-bold">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" 
                   class="block w-full text-gray-500">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Add Animal
            </button>
        </div>
    </form>
</div>
@endsection

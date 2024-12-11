@extends('layouts.base')

@section('content')
<div class="container mx-auto p-8">
    @if ($animal)
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-6">{{ ucfirst($animal->name) }} - Details (show.blade)</h1>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Animal Picture -->
                @if($animal->profile_picture)
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $animal->profile_picture) }}" alt="{{ $animal->name }} picture" class="w-64 h-auto rounded-lg shadow-lg">
                    </div>
                @endif

                <!-- Animal Details -->
                <div>
                    <p class="text-xl font-medium text-gray-700"><strong>Name:</strong> {{ $animal->name }}</p>
                    <p class="text-lg text-gray-600"><strong>Species:</strong> {{ $animal->species }}</p>
                    <p class="text-lg text-gray-600"><strong>Breed:</strong> {{ $animal->breed ?? 'N/A' }}</p>
                    <p class="text-lg text-gray-600"><strong>Gender:</strong> {{ ucfirst($animal->gender) }}</p>
                    <p class="text-lg text-gray-600"><strong>Date of Birth:</strong> {{ $animal->date_of_birth ?? 'N/A' }}</p>
                    <p class="text-lg text-gray-600"><strong>Date of Arrival:</strong> {{ $animal->date_of_arrival }}</p>
                    <p class="text-lg text-gray-600"><strong>Color:</strong> {{ $animal->color ?? 'N/A' }}</p>
                    <p class="text-lg text-gray-600"><strong>Weight:</strong> {{ $animal->weight ?? 'N/A' }} kg</p>
                    <p class="text-lg text-gray-600"><strong>Neutered:</strong> {{ $animal->is_neutered ? 'Yes' : 'No' }}</p>
                    <p class="text-lg text-gray-600"><strong>Vaccinated:</strong> {{ $animal->is_vaccinated ? 'Yes' : 'No' }}</p>
                    <p class="text-lg text-gray-600"><strong>Microchip Number:</strong> {{ $animal->microchip_number ?? 'N/A' }}</p>
                    <p class="text-lg text-gray-600"><strong>Personality Traits:</strong> {{ $animal->personality_traits ?? 'No traits provided' }}</p>
                    <p class="text-lg text-gray-600"><strong>Special Needs:</strong> {{ $animal->special_needs ?? 'No special needs' }}</p>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('adopt.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold text-lg">Back to all animals</a>
            </div>
        </div>
    @else
        <p class="text-red-600 text-xl text-center mb-4">Animal not found or no data available.</p>
        <div class="text-center">
            <a href="{{ route('adopt.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold text-lg">Back to all animals</a>
        </div>
    @endif
</div>
@endsection

@extends('layouts.base')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-8">Animals Available for Adoption</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($animals as $animal)
                <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col">
                    <!-- Animal Image -->
                    @if($animal->picture)
                        <img src="{{ asset('storage/' . $animal->picture) }}" 
                             alt="{{ $animal->type }} picture" 
                             class="rounded-t-lg w-full h-48 object-cover">
                    @else
                        <div class="bg-gray-200 rounded-t-lg w-full h-48 flex items-center justify-center">
                            <span class="text-gray-500">No Image Available</span>
                        </div>
                    @endif

                    <!-- Animal Info -->
                    <div class="flex flex-col p-4 space-y-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $animal->type }} Looking for a Home</h2>
                        <ul class="text-gray-600">
                            <li><strong>Sizzzzze:</strong> {{ $animal->size ?? 'N/A' }}</li>
                            <li><strong>Age:</strong> {{ $animal->age ?? 'N/A' }} years</li>
                            <li><strong>Color:</strong> {{ $animal->color ?? 'N/A' }}</li>
                            <li><strong>Garden Needed:</strong> {{ $animal->garden_needed ? 'Yes' : 'No' }}</li>
                        </ul>
                        <p class="text-gray-700"><strong>Description:</strong> {{ $animal->description ?? 'No description provided' }}</p>

                        <!-- Detailed Page Link -->
                        <a href="{{ route('animals.show', $animal) }}" 
                           class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg shadow-md">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

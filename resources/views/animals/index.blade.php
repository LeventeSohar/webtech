@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-semibold mb-6">Available Animals (Adopt)</h1>

    <!-- Admin Create Animal Button -->
    @auth
    @if(auth()->user()->is_admin)
    <div class="mb-6">
        <a href="{{ route('animals.create') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
            Add New Animal
        </a>
    </div>
    @endif
    @endauth

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($animals as $animal)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
            <!-- Animal Image -->
            @if($animal->profile_picture)
            <img src="{{ asset('storage/' . $animal->profile_picture) }}" alt="{{ $animal->name ?? $animal->type }}" class="w-full h-48 object-cover rounded-t">
            @else
            <div class="w-full h-48 bg-gray-200 rounded-t flex items-center justify-center text-gray-500">
                No Image Available
            </div>
            @endif

            <!-- Animal Details -->
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2">{{ $animal->name ?? ucfirst($animal->species) }}</h2>

                </p>
                <p class="text-sm font-semibold text-gray-800 mb-1">
                    <strong>Weight:</strong> {{ $animal->weight ?? 'Unknown' }} kg
                </p>

                <p class="text-sm text-gray-600 mb-1"><strong>Species:</strong> {{ ucfirst($animal->species) ?? 'N/A' }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Breed:</strong> {{ $animal->breed ?? 'N/A' }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Gender:</strong> {{ ucfirst($animal->gender) ?? 'N/A' }}</p>
                <p class="text-sm text-gray-600 truncate"><strong>Description:</strong> {{ $animal->description ?? 'No description available' }}</p>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center px-4 pb-4">
                <a href="{{ route('animals.show', $animal) }}" class="text-blue-500 hover:underline">View</a>
                @auth
                @if(auth()->user()->is_admin)
                <a href="{{ route('animals.edit', $animal) }}" class="text-yellow-500 hover:underline">Edit</a>
                @endif
                @endauth
            </div>

            <!-- Delete Option for Admin -->
            @if(auth()->check() && auth()->user()->is_admin)
            <form action="{{ route('animals.destroy', $animal) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this animal?');" class="px-4 pb-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
            </form>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection

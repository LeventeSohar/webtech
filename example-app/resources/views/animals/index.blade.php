@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-semibold mb-6">Available Animals (adopt)</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($animals as $animal)
        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
            <!-- Animal Image -->
        @if($animal->profile_picture)
        <img src="{{ asset('storage/' . $animal->profile_picture) }}" alt="{{ $animal->type }}" class="w-full h-48 object-cover rounded-t">
            @else
        <div class="w-full h-48 bg-gray-200 rounded-t flex items-center justify-center text-gray-500">
            No Image hmmmmm
        </div>
        @endif


            <!-- Animal Details -->
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2">{{ $animal->name ?? ucfirst($animal->type) }}</h2>
                <p class="text-sm text-gray-600 mb-1"><strong>Age:</strong> {{ $animal->age ?? 'Unknown' }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Size:</strong> {{ $animal->size ?? 'Unknown' }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Color:</strong> {{ $animal->color ?? 'Unknown' }}</p>
                <p class="text-sm text-gray-600 truncate"><strong>Description:</strong> {{ $animal->description ?? 'No description available' }}</p>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('animals.show', $animal) }}" class="text-blue-500 hover:underline">View</a>
                <a href="{{ route('animals.edit', $animal) }}" class="text-yellow-500 hover:underline">Edit</a>
            </div>

            @if(auth()->check() && auth()->user()->is_admin)
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this animal?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endif

        </div>
        @endforeach
    </div>
</div>
@endsection

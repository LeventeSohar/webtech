@extends('layouts.app')

@section('content')
    <h1>{{ ucfirst($animal->type) }} Available for Adoption</h1>
    <div class="animal-details">
        <h2>{{ $animal->type }} looking for a home</h2>
        <p><strong>Size:</strong> {{ $animal->size ?? 'N/A' }}</p>
        <p><strong>Age:</strong> {{ $animal->age ?? 'N/A' }} years</p>
        <p><strong>Color:</strong> {{ $animal->color ?? 'N/A' }}</p>
        <p><strong>Description:</strong> {{ $animal->description ?? 'No description provided' }}</p>
        <p><strong>Garden Needed:</strong> {{ $animal->garden_needed ? 'Yes' : 'No' }}</p>

        <!-- Display Picture if Available -->
        @if($animal->picture)
            <img src="{{ asset('storage/' . $animal->picture) }}" alt="{{ $animal->type }} picture" style="width:300px; height:auto;">
        @endif

        <a href="{{ route('adoption.index') }}">Back to all animals</a>
    </div>
@endsection
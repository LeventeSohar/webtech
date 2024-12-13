@extends('layouts.app')

@section('content')

    <div class="animal-details" style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px;">
        <!-- Picture Section -->
        @if($animal->picture)
            <img src="{{ asset('storage/' . $animal->picture) }}" alt="{{ $animal->type }} picture" 
                style="width: 300px; height: auto; border-radius: 8px;">
        @endif

        <!-- Text Section -->
        <div>
            <h2>{{ $animal->type ?? 'Unknown Animal' }} looking for a home</h2>
            <p><strong>Size:</strong> {{ $animal->size ?? 'N/A' }}</p>
            <p><strong>Age:</strong> {{ $animal->age ?? 'N/A' }} years</p>
            <p><strong>Color:</strong> {{ $animal->color ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $animal->description ?? 'No description provided' }}</p>
            <p><strong>Garden Needed:</strong> {{ $animal->garden_needed ? 'Yes' : 'No' }}</p>
            <a href="{{ route('adopt.index') }}" style="color: blue; text-decoration: underline;">Back to all animals</a>
        </div>
    </div>
    
@endsection


@extends('layouts.base')

@section('content')
    <h1>Animals Available for Adoption</h1>
    
    <div class="animal-list">
        @foreach($animals as $animal)
            <!-- Animal Card -->
            <div id="animal-{{ $animal->id }}" 
                class="animal-card" 
                style="display: flex; flex-direction: column; margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; transition: all 0.3s ease;">
                
                <div style="display: flex; align-items: flex-start; gap: 20px;">
                    <!-- Animal Picture -->
                    @if($animal->picture)
                        <img src="{{ asset('images/animals/' . $animal->picture) }}" 
                            alt="{{ $animal->type }} picture" 
                            style="width: 300px; height: auto; border-radius: 8px; object-fit: cover;">
                    @endif

                    <!-- Details Section -->
                    <div class="animal-details" style="flex: 1;">
                        <!-- Basic Details -->
                        <p><strong>Age:</strong> {{ $animal->age ?? 'N/A' }} years</p>
                        <p><strong>Size:</strong> {{ $animal->size ?? 'N/A' }}</p>
                        <p><strong>Garden Needed:</strong> {{ $animal->garden_needed ? 'Yes' : 'No' }}</p>

                        <!-- "Read More" Button -->
                        <button class="read-more" data-id="{{ $animal->id }}" 
                            style="color: blue; text-decoration: underline; background: none; border: none; cursor: pointer;">
                            Read more...
                        </button>
                    </div>
                </div>

                <!-- Further Details Section (Hidden Initially) -->
                <div id="details-{{ $animal->id }}" 
                    class="animal-more-details" 
                    style="display: none; margin-top: 10px; padding-left: 320px; transition: all 0.3s ease;">
                    <!-- Further Details -->
                    <p><strong>Color:</strong> {{ $animal->color ?? 'N/A' }}</p>
                    <p><strong>Description:</strong> {{ $animal->description ?? 'No description provided' }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // JavaScript to handle "Read More" functionality
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.read-more').forEach(function (button) {
                button.addEventListener('click', function () {
                    const animalId = this.getAttribute('data-id');
                    const details = document.getElementById('details-' + animalId);
                    const card = document.getElementById('animal-' + animalId);

                    // Toggle visibility
                    if (details.style.display === 'none') {
                        details.style.display = 'block';
                        card.style.flexDirection = 'column';
                        this.textContent = 'Show less...';
                    } else {
                        details.style.display = 'none';
                        this.textContent = 'Read more...';
                    }
                });
            });
        });
    </script>
@endsection

 


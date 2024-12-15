@extends('layouts.base')

@section('content')
    <h1>Animals Available for Adoption</h1>
    
    <!-- Unified Filter Form -->
    <form method="GET" action="{{ route('adopt.index') }}" style="margin-bottom: 20px;">
        <!-- Dropdown: Filter by Type -->
        <label for="type">Filter by Type:</label>
        <select name="type" id="type">
            <option value="">All</option> <!-- 'All' option -->
            <option value="dog" {{ request('type') === 'dog' ? 'selected' : '' }}>Dog</option>
            <option value="cat" {{ request('type') === 'cat' ? 'selected' : '' }}>Cat</option>
            <option value="rodent" {{ request('type') === 'rodent' ? 'selected' : '' }}>Rodent</option>
        </select>

        <!-- Checkbox: Show Newest/Oldest -->
        <label style="margin-left: 20px;">
            <input type="checkbox" name="newest" value="1" id="newest" 
                {{ request('newest') ? 'checked' : '' }}>
            Show Newest First
        </label>

        <label style="margin-left: 10px;">
            <input type="checkbox" name="oldest" value="1" id="oldest" 
                {{ request('oldest') ? 'checked' : '' }}>
            Show Oldest First
        </label>

        <!-- Submit Button -->
        <button type="submit" style="margin-left: 20px; padding: 5px 15px;">Apply Filters</button>
    </form>

    <!-- Animal List -->
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
                    <p><strong>Color:</strong> {{ $animal->color ?? 'N/A' }}</p>
                    <p><strong>Description:</strong> {{ $animal->description ?? 'No description provided' }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Single-selection logic for checkboxes
            const newestCheckbox = document.getElementById('newest');
            const oldestCheckbox = document.getElementById('oldest');

            newestCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    oldestCheckbox.checked = false; // Uncheck 'oldest' when 'newest' is checked
                }
            });

            oldestCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    newestCheckbox.checked = false; // Uncheck 'newest' when 'oldest' is checked
                }
            });

            // "Read More" functionality
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

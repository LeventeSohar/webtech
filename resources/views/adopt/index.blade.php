@extends('layouts.base')

@section('content')
    <!-- Main heading only once! -->
    <h1>Animals Available for Adoption</h1>
    
    <!-- For the Filter (Hannas Individual Topic): -->
    <form method="GET" action="{{ route('adopt.index') }}" style="margin-bottom: 20px;">
        
        <!-- 1. Dropdown bar: Choose All,dog,cat or rodent for animal type -->
        <label for="type">Filter Animals:</label>
        <select name="type" id="type">
            <option value="">All</option> 
            <option value="dog" {{ request('type') === 'dog' ? 'selected' : '' }}>Dog</option>
            <option value="cat" {{ request('type') === 'cat' ? 'selected' : '' }}>Cat</option>
            <option value="rodent" {{ request('type') === 'rodent' ? 'selected' : '' }}>Rodent</option>
        </select>

        <!-- 2. Checkbox next to Dropdown for pressing newest or oldest added animal  -->
        <label style="margin-left: 20px;">
            <input type="checkbox" name="newest" value="1" id="newest" 
                {{ request('newest') ? 'checked' : '' }}>
            Show Newest Arrivals First
        </label>

        <label style="margin-left: 20px;">
            <input type="checkbox" name="oldest" value="1" id="oldest" 
                {{ request('oldest') ? 'checked' : '' }}>
            Show Longest Stay First
        </label>

        <!-- 3. Simple Submit Button -->
        <button type="submit" style="margin-left: 20px; padding: 5px 15px;">Filter</button>
    </form>

    <!-- Animal List from database -->
    <div class="animal-list">
        
        @foreach($animals as $animal)
           
            <!-- Animal card so that its easier distinguishable (important for visual experience) -->
            <div id="animal-{{ $animal->id }}" 
                class="animal-card" 
                style="display: flex; flex-direction: column; margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; transition: all 0.3s ease;">
                <div style="display: flex; align-items: flex-start; gap: 20px;">
                    
                    <!-- In each Animal card there is: -->
                    <!-- 1. Animal Picture on the left -->
                    @if($animal->picture)
                        <img src="{{ asset('images/animals/' . $animal->picture) }}" 
                            alt="{{ $animal->type }} picture" 
                            style="width: 300px; height: auto; border-radius: 8px; object-fit: cover;">
                    @endif

                    <!-- 2. Bullet points for Age, Size, Garden needed next to it -->
                    <div class="animal-details" style="flex: 1;">
                        <p><strong>Age:</strong> {{ $animal->age ?? 'N/A' }} years</p>
                        <p><strong>Size:</strong> {{ $animal->size ?? 'N/A' }}</p>
                        <p><strong>Garden Needed:</strong> {{ $animal->garden_needed ? 'Yes' : 'No' }}</p>

                        <!-- "Read More" Button for further Information under it -->
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

    <!-- JavaScript for functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            // 1. Checkbox functionalities
            const newestCheckbox = document.getElementById('newest');
            const oldestCheckbox = document.getElementById('oldest');
            
            // 2. Only one checkbox can be checked at once
            newestCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    oldestCheckbox.checked = false; 
                }
            });

            oldestCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    newestCheckbox.checked = false;
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

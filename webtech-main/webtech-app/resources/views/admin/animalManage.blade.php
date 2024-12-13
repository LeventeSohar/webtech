<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/TopCSS.css'])
    @endif

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Pet Shelter Flensburg</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/animalManage">Animals</a></li>
                    <li class="nav-item"><a class="nav-link" href="/volunteerManage">Volunteers</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blogManage">Blog</a></li>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Animal Management</h1>
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#addAnimalForm"
            aria-expanded="false" aria-controls="addAnimalForm">
            Add New Animal
        </button>
    </div>

    <div class="team-section">

        <!-- Collapsible Animal Form -->
        <div class="collapse" id="addAnimalForm">
            <div class="card card-body">
                <form action="{{ route('storeAnimal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="1">Dog</option>
                            <option value="2">Cat</option>
                            <option value="3">Bird</option>
                            <option value="4">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Add Animal</button>
                </form>
            </div>
        </div>

        <!-- Animal List Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animals as $animal)
                    <tr>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->age }}</td>
                        <td>
                            @switch($animal->type)
                                @case(1)
                                    Dog
                                @break

                                @case(2)
                                    Cat
                                @break

                                @case(3)
                                    Bird
                                @break

                                @default
                                    Other
                            @endswitch
                        </td>
                        <td>{{ $animal->description }}</td>
                        <td>
                            @if ($animal->image)
                                <img src="{{ asset('storage/' . $animal->image) }}" alt="Animal Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        
                        <td>
                            <form action="{{ route('animal.delete', $animal->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

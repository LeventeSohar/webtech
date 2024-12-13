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
        <h1>You have logged in</h1>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <div class="row text-center">
            <!-- Left Section -->
            <div class="col-md-4">
                <a href="{{ route('animalManage') }}" class="dashboard-button">Manage Animals</a>
            </div>

            <!-- Middle Section -->
            <div class="col-md-4">
                <a href="{{ route('volunteerManage') }}" class="dashboard-button">Manage Volunteers</a>
            </div>

            <!-- Right Section -->
            <div class="col-md-4">
                <a href="{{ route('blogManage') }}" class="dashboard-button">Manage Blog</a>
            </div>
        </div>



    </div>


    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

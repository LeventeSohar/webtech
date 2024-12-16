<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #0056b3;
            padding: 1rem;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .navbar-nav .nav-item:not(:last-child) {
            margin-right: 1rem;
        }

        .nav-link:hover {
            color: #d1e0f0 !important;
        }

        /* Footer */
        .footer {
            background-color: #0056b3;
            color: #fff;
            padding: 1rem;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        /* Centered container for form and map */
        .centered-container {
        display: flex;
        justify-content: flex-end;
        align-items: flex-start;
        min-height: calc(100vh - 70px);
        padding: 2rem;
        width: 100%; /* Ensure it takes the full width of the screen */
        max-width: none; /* Remove any maximum width constraint */
        }

        .signup-form {
            width: 100%; /* Take up the full width of the container */
            max-width: 1200px; /* Set the max-width to your desired size */
            padding: 2rem;
        }

        .map-container {
            width: 100%; /* Ensure the map container takes up available space */
            max-width: 600px; /* You can adjust this size */
        }

        .map-container iframe {
            width: 100%; /* Ensure the iframe takes the full width of the container */
            height: 900px; /* Set map height */
        }
    
        .image-class {
            position: absolute;   /* Position relative to the nearest positioned ancestor */
            top: 110px;            /* Adjust to be below the navbar (assuming navbar height is 70px) */
            left: 80px;           /* Position the image on the left with some space from the edge */
            width: 700px;         /* Adjust the width as needed */
            height: auto;         /* Keep the aspect ratio intact */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Pet Shelter Flensburg</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/adopt">Adopt</a></li>
                    <li class="nav-item"><a class="nav-link" href="/guidelines">Guidelines</a></li>
                    <li class="nav-item"><a class="nav-link" href="/donate">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="/volunteer">Volunteer</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/signin">Sign-in</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <img src="/images/1.dogadopt.png" alt="Description of image" class="image-class">

    <!-- Main Content Area -->
    <div class="container centered-container">
        <div class="row justify-content-center">
            <!-- Form Column -->
            <div class="col-lg-7">
                <div class="signup-form bg-white shadow p-5 rounded">
                    <h1 class="text-center mb-4">Volunteer at Our Animal Shelter</h1>
                    <p class="text-center">Sign up to receive more information about volunteering! Help feed, clean, and play with animals, and assist in adoption events. Make a difference in their lives!</p>
                    
                    <!-- Sign-up Form -->
                    <form action="{{ route('volunteer.form') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mt-3">Sign Up</button>
                    </form>

                    <!-- Success/Failure Messages -->
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Map Column -->
            <div class="col-lg-5 d-flex align-items-center">
                <div class="map-container">
                    <h1>Find Us on the Map</h1>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6952.613379775319!2d9.794736250212907!3d54.91157722998029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sdk!4v1730858100839!5m2!1sen!2sdk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
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

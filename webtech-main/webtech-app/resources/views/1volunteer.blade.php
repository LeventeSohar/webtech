<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer at Pet Shelter Flensburg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Your custom styles here */
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
        }

        .navbar {
            background-color: #0056b3;
            padding: 1rem;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar-nav .nav-item:not(:last-child) {
            margin-right: 1rem;
        }

        .nav-link:hover {
            color: #d1e0f0 !important;
        }

        /* Main Container */
        .main-container {
            display: flex;
            gap: 30px;
            align-items: flex-start;
            justify-content: flex-start;
            width: 90%;
            max-width: 1400px;
            padding: 50px;
            height: 100%;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center center;
            border-radius: 16px;
            margin: 20px auto;
        }

        /* Main Content Section (Big Box with Form) */
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 16px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            padding: 40px 60px;
            text-align: center;
            width: 700px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .hero-image {
            width: 50%;
            height: auto;
            border-radius: 16px;
            margin-bottom: 20px;
        }

        button {
            padding: 20px;
            font-size: 32px;
            background-color: #0078d7;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        button:hover {
            background-color: #005bb5;
        }

        button:active {
            background-color: #004a93;
        }

        /* Sidebar */
        .sidebar {
            background-color: #0078d7;
            color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            font-size: 18px;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .sidebar p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        /* Footer */
        .footer {
            background-color: #0056b3;
            color: #fff;
            padding: 1rem;
            text-align: center;
            margin-top: 30px;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                align-items: center;
            }

            .container, .sidebar {
                width: 90%;
            }

            .google-map iframe {
                width: 100%;
                height: 400px;
            }
        }

        @media (max-width: 400px) {
            .container, .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Pet Shelter Flensburg</a>
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

    <!-- Main Content Area -->
    <div class="main-container">
        <!-- Main Content Section (Big Box with Form) -->
        <div class="container">
            <h1>Volunteer at Our Animal Shelter</h1>
            <img src="kitty.jfif" alt="Animal Shelter" class="hero-image">
            <p>Sign up to receive more information about volunteering!</p>

            <!-- Form -->
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
                
                <button type="submit" class="btn btn-primary">Sign Up</button>
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

        <!-- Sidebar with Volunteering Info and Map -->
        <div class="sidebar">
            <h2>Volunteer Information</h2>
            <p><strong>Volunteering Hours:</strong> Saturdays and Sundays, 12:00 PM - 4:00 PM</p>
            <p><strong>What to Expect:</strong> Help feed, clean, and play with animals, assist in adoption events. Make a difference in their lives!</p>

            <h3>Find Us on the Map</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6952.613379775319!2d9.794736250212907!3d54.91157722998029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sdk!4v1730858100839!5m2!1sen!2sdk" width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

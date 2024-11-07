<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
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

        /* Welcome section */
        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 4rem 1rem;
            background-color: #e9ecef;
        }
        .hero img {
            max-width: 400px;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .hero h1 {
            font-size: 2.5rem;
            color: #0056b3;
            margin-top: 1rem;
        }
        .hero p {
            max-width: 700px;
            color: #555;
        }

        /* Info Box Styling */
        .info-box {
            background-color: #e3f2fd; /* Light blue shade */
            color: #333;
            padding: 30px;
            text-align: center;
            margin: 2rem 0;
            border: 1px solid #b3e5fc;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .info-box p {
            margin: 0.5rem 0;
        }
        .email-button {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
        }
        .email-button:hover {
            background-color: #004494;
        }

        /* Footer */
        .footer {
            background-color: #0056b3;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }
        .footer p {
            margin: 0;
            font-size: 0.9rem;
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

    <!-- Hero Section -->
    <div class="hero">
        <img src="/images/1.dogadopt.png" alt="Front Picture">
        <h1>Welcome to Pet Shelter Flensburg</h1>
        <p>You are one step closer to giving a lonely pet a second chance. Whether you’re looking for a dog, cat, or small animal, we’re here to help you find your new furry friend.</p>
    </div>

    <!-- Volunteer Info Box -->
    <div class="info-box">
        <h2>Become a Volunteer</h2>
        <p>Join our team of dedicated volunteers at Pet Shelter Flensburg. Help us care for animals, assist in adoption events, and more. Sign up today to make a difference!</p>
        <!-- You can add the form here to submit the volunteer sign-up -->
        <form action="{{ route('submitForm') }}" method="POST">
            @csrf
            <div>
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button class="email-button" type="submit">Sign Up</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>

    <!-- Scripts -->
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script-->
</body>
</html>

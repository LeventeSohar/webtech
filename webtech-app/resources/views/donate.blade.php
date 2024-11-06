<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
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

        /* Team section */
        .team-section {
            padding: 3rem 1rem;
            background-color: #f8f9fa;
            text-align: center;
        }
        .team-section h2 {
            font-size: 2rem;
            color: #0056b3;
            margin-bottom: 1.5rem;
        }
        .team-section img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .team p {
            max-width: 600px; /* Limit the width to about half of a standard screen */
            width: 100%; /* Allow it to take full width up to max-width */
            margin: 0 auto; /* Center the paragraph horizontally */
            color: #555;
            text-align: center; /* Center the text within the paragraph */
        }

        /* Info Box Styling - should be in app.css though*/
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
            position: fixed;
            bottom: 0;
            width: 100%;
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
        <h1>Pet Shelter Flensburg Thank's you for help</h1>
        <p>As a charity run shelter, Pet Shelter Flensborg relies entirely on the supprt from kind hearted souls.</p>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <h2>How to donate</h2>
        <img src="/images/qr1.png" alt="Mobilepay QR">
        <p> Use the above QR code to donate via mobilepay. </p>
        <img src="/images/qr2.png" alt="Paypal QR">
        <p> Use the above QR code to donate via paypal. </p>
        <br>
        <img src="/images/happyDog.png" alt="Happy Dog smiling">
        <p> Bruno thanks for you gratitude </p>


    </div>

    <!-- Should this be removed? 
    @include('info-box')
    -->
    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

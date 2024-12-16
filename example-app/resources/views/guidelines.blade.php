<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg - Guidelines</title>
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

        /* Main Content */
        main {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1, h2 {
            color: #1a1818;
        }

        .guideline-list {
            margin-top: 20px;
        }

        .guideline-item {
            margin-bottom: 15px;
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

    <!-- Main Content Section -->
    <main>
        <h1>Guidelines for Adopting a Pet</h1>
        <p>We’re excited to help you adopt a pet! Please read our guidelines below to ensure a safe and healthy adoption process for both you and the animals.</p>
        
        <div class="guideline-list">
            <div class="guideline-item">
                <h2>1. Research Before You Adopt</h2>
                <p>Make sure to research the type of pet you’re interested in adopting. Different species and breeds have unique needs in terms of diet, exercise, and care.</p>
            </div>
            <div class="guideline-item">
                <h2>2. Be Ready for a Long-Term Commitment</h2>
                <p>Adopting a pet is a long-term commitment. Ensure you have the time, resources, and dedication to provide a loving and stable environment for your new family member.</p>
            </div>
            <div class="guideline-item">
                <h2>3. Understand the Costs</h2>
                <p>Owning a pet comes with various costs including food, veterinary care, and supplies. Be prepared for these ongoing expenses before deciding to adopt.</p>
            </div>
            <div class="guideline-item">
                <h2>4. Visit the Pet First</h2>
                <p>Always meet the pet you’re considering for adoption in person before making a decision. This helps ensure that you’re comfortable with the animal’s personality and temperament.</p>
            </div>
            <div class="guideline-item">
                <h2>5. Complete the Adoption Process</h2>
                <p>Once you’ve selected a pet, follow through with the necessary adoption paperwork and home checks to ensure the pet’s safety and well-being in your home.</p>
            </div>
        </div>

        <p>If you have any further questions about our adoption process, feel free to reach out to us!</p>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

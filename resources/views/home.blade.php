<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    <!-- Bootstrap for horizontal Navigation bar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- for having styling in app.css + vite due to package.json setting -->
    @vite(['resources/css/app.css'])
</head>
<body>

    <!-- Navigation bar -->
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

    <!-- Team Section -->
    <div class="team-section">
        <h2>Meet Our Team</h2>
        <img src="/images/2.team.png" alt="Team Photo">
        <p> Here we introduce our small, friendly team of permanent employees and our volunteer board of directors so that you can recognize us on site. Our animal shelter and our animal welfare association is strongly supported by very committed volunteers who spend several thousand hours a year doing a large part of the work involved, such as looking after our youth groups, maintaining the grounds, renovation and repair work, planning and organizing flea markets and open days, preparing and manning our information stands and much more. 
            We look forward to your visit with us.
            See you soon, your animal shelter Flensburg</p>

    </div>

    @include('info-box')
    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

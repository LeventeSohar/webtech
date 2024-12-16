<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .signin-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .signin-container h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 1.5rem;
        }

        .signin-container form .form-control {
            margin-bottom: 1rem;
        }

        .signin-container .btn-primary {
            width: 100%;
            background-color: grey; /* Initially grey */
            border: none;
            transition: background-color 0.3s ease;
        }

        .signin-container .btn-primary:hover {
            background-color: #004494;
        }

        .signin-container .forgot-password {
            text-align: center;
            display: block;
            margin-top: 1rem;
            color: #555;
        }

        .signin-container .forgot-password:hover {
            color: #0056b3;
            text-decoration: none;
        }

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

        /* Button styles for different states */
        .btn-admin {
            background-color: yellow;
            border: none;
        }

        .btn-not-admin {
            background-color: red;
            border: none;
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

    <!-- Sign-In Container -->
    <div class="signin-container">
        <h2>Sign In</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" id="signInButton">Sign In</button>
            <a href="#" class="forgot-password">Forgot password?</a>
        </form>

        <!-- Check if user is signed in -->
        @if(Auth::check())
        <button class="btn btn-success mt-3">You are signed in</button> <!-- Green button if signed in -->
        
        @if(Auth::user()->is_admin)  <!-- Check if the user is an admin (true/false check) -->
            <button class="btn btn-admin mt-3">You are an Admin</button> <!-- Yellow button for admins -->
        @else
            <button class="btn btn-not-admin mt-3">You are not an Admin</button> <!-- Red button for non-admins -->
        @endif
        
        <!-- Go to Dashboard button for both users and admins -->
        <form action="{{ route('dashboard') }}" method="GET">
            <button type="submit" class="btn btn-success mt-3">Go to Dashboard</button>
        </form>
    
        <!-- Sign Out Button -->
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Sign Out</button>
        </form>
    @else
        <button class="btn btn-danger mt-3">You are not signed in</button> <!-- Red button if not signed in -->
    @endif
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

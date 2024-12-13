<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pet Shelter Flensburg</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans text-gray-800 bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-700 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-semibold">Pet Shelter Flensburg</a>
            <button class="lg:hidden text-white" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <div class="hidden lg:flex space-x-4">
                <a href="/adopt" class="text-white hover:text-blue-300">Adopt</a>
                <a href="/guidelines" class="text-white hover:text-blue-300">Guidelines</a>
                <a href="/donate" class="text-white hover:text-blue-300">Donate</a>
                <a href="/volunteer" class="text-white hover:text-blue-300">Volunteer</a>
                <a href="/blog" class="text-white hover:text-blue-300">Blog</a>
                <a href="/signin" class="text-white hover:text-blue-300">Sign-in</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <main class="py-8">
        <div class="container mx-auto">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-blue-700 mb-4">Welcome to Your Dashboard</h2>
                <p>This is your personalized dashboard. Here you can access all your information and manage your account.</p>
                <!-- Add additional dashboard content here, like user info, statistics, etc. -->
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-4 text-center">
        <p class="text-sm">&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>

</body>
</html>

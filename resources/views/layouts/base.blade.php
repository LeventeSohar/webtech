<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pet Shelter Flensburg')</title>

    <!-- Include Vite for Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Brand -->
                <a href="/" class="text-white text-2xl font-bold">Pet Shelter Flensburg</a>

                <!-- Mobile Menu Button -->
                <button id="menuToggle" class="block lg:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop Links -->
                <div id="menu" class="hidden lg:flex lg:items-center lg:space-x-4">
                    <a href="/adopt" class="text-white hover:text-gray-200">Adopt</a>
                    <a href="/guidelines" class="text-white hover:text-gray-200">Guidelines</a>
                    <a href="/donate" class="text-white hover:text-gray-200">Donate</a>
                    <a href="/volunteer" class="text-white hover:text-gray-200">Volunteer</a>
                    <a href="/blog" class="text-white hover:text-gray-200">Blog</a>
                    <a href="/signin" class="text-white hover:text-gray-200">Sign-in</a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Links -->
        <div id="mobileMenu" class="hidden lg:hidden bg-blue-500">
            <a href="/adopt" class="block text-white px-4 py-2 hover:bg-blue-600">Adopt</a>
            <a href="/guidelines" class="block text-white px-4 py-2 hover:bg-blue-600">Guidelines</a>
            <a href="/donate" class="block text-white px-4 py-2 hover:bg-blue-600">Donate</a>
            <a href="/volunteer" class="block text-white px-4 py-2 hover:bg-blue-600">Volunteer</a>
            <a href="/blog" class="block text-white px-4 py-2 hover:bg-blue-600">Blog</a>
            <a href="/signin" class="block text-white px-4 py-2 hover:bg-blue-600">Sign-in</a>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mx-auto my-8">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2024 Pet Shelter Flensburg - All Rights Reserved
    </footer>

    <!-- Script for Menu Toggle -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Navbar -->

    <nav class="bg-blue-700 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-lg font-bold">Pet Shelter Flensburg</a>
            <button class="block lg:hidden text-white focus:outline-none" id="navbarToggle">
                <span class="material-icons">menu</span>
            </button>
            <ul class="hidden lg:flex space-x-6" id="navbarNav">
                <li><a href="/adopt" class="hover:text-blue-300">Adopt</a></li>
                <li><a href="/guidelines" class="hover:text-blue-300">Guidelines</a></li>
                <li><a href="/donate" class="hover:text-blue-300">Donate</a></li>
                <li><a href="/volunteer" class="hover:text-blue-300">Volunteer</a></li>
                <li><a href="/blog" class="hover:text-blue-300">Blog</a></li>
                <li><a href="/signin" class="hover:text-blue-300">Sign-in</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gray-200 py-12 text-center">
        <div class="container mx-auto">
            //<img src="/images/1.dogadopt.png" alt="Front Picture" class="mx-auto mb-6 rounded-lg shadow-lg w-80">
            <h1 class="text-4xl font-bold text-blue-700">Welcome to Pet Shelter Flensburg</h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                You are one step closer to giving a lonely pet a second chance. Whether you’re looking for a dog, cat, or small animal, we’re here to help you find your new furry friend.
            </p>
        </div>
    </div>

    <!-- Team Section -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-700 mb-6">Meet Our Team</h2>
            //<img src="/images/2.team.png" alt="Team Photo" class="mx-auto mb-6 rounded-lg shadow-lg w-3/4 lg:w-1/2">
            <p class="text-gray-600 max-w-3xl mx-auto">
                Here we introduce our small, friendly team of permanent employees and our volunteer board of directors so that you can recognize us on site. Our animal shelter and our animal welfare association is strongly supported by very committed volunteers who spend several thousand hours a year doing a large part of the work involved, such as looking after our youth groups, maintaining the grounds, renovation and repair work, planning and organizing flea markets and open days, preparing and manning our information stands and much more. 
                We look forward to your visit with us.
                See you soon, your animal shelter Flensburg.
            </p>
        </div>
    </div>

    <!-- Info Box (optional) -->
    @include('info-box')

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
        </div>
    </footer>

    <!-- Toggle Script for Navbar (Tailwind-based responsiveness) -->
    <script>
        document.getElementById('navbarToggle').addEventListener('click', function () {
            const navbarNav = document.getElementById('navbarNav');
            navbarNav.classList.toggle('hidden');
        });
    </script>

</body>
</html>

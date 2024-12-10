<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelter Flensburg</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles that extend beyond Tailwind */
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
    </style>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <!-- Navbar -->
    <nav class="bg-blue-700 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="/" class="text-white font-semibold text-xl">Pet Shelter Flensburg</a>
            <ul class="flex space-x-4">
                <li><a href="/adopt" class="text-white hover:text-blue-300">Adopt</a></li>
                <li><a href="/guidelines" class="text-white hover:text-blue-300">Guidelines</a></li>
                <li><a href="/donate" class="text-white hover:text-blue-300">Donate</a></li>
                <li><a href="/volunteer" class="text-white hover:text-blue-300">Volunteer</a></li>
                <li><a href="/blog" class="text-white hover:text-blue-300">Blog</a></li>
                <li><a href="/signin" class="text-white hover:text-blue-300">Sign-in</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gray-200 py-12 text-center">
        <img src="/images/1.dogadopt.png" alt="Front Picture" class="mx-auto rounded-lg max-w-sm">
        <h1 class="text-4xl font-bold text-blue-700 mt-4">Welcome to Pet Shelter Flensburg</h1>
        <p class="text-gray-600 max-w-2xl mx-auto mt-2">You are one step closer to giving a lonely pet a second chance. Whether you’re looking for a dog, cat, or small animal, we’re here to help you find your new furry friend.</p>
    </div>

    <!-- Team Section -->
    <div class="bg-white py-12 text-center">
        <h2 class="text-2xl font-semibold text-blue-700">Meet Our Team</h2>
        <img src="/images/2.team.png" alt="Team Photo" class="mx-auto rounded-lg shadow-md max-w-lg mt-4">
        <p class="text-gray-600 max-w-xl mx-auto mt-4">Here we introduce our small, friendly team of permanent employees and our volunteer board of directors so that you can recognize us on site. Our animal shelter and our animal welfare association is strongly supported by very committed volunteers who spend several thousand hours a year doing a large part of the work involved, such as looking after our youth groups, maintaining the grounds, renovation and repair work, planning and organizing flea markets and open days, preparing and manning our information stands and much more. We look forward to your visit with us. See you soon, your animal shelter Flensburg.</p>
    </div>

    <!-- Info Box -->
    <div class="info-box">
        <p>Want to stay updated? Subscribe to our newsletter!</p>
        <button class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Subscribe</button>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-4">
        <p class="text-center text-sm">&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>

</body>
</html>

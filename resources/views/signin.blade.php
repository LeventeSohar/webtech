<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-blue-700 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a class="text-xl font-semibold" href="/">Pet Shelter Flensburg</a>
            <div class="flex space-x-4">
                <a class="hover:text-blue-300" href="/adopt">Adopt</a>
                <a class="hover:text-blue-300" href="/guidelines">Guidelines</a>
                <a class="hover:text-blue-300" href="/donate">Donate</a>
                <a class="hover:text-blue-300" href="/volunteer">Volunteer</a>
                <a class="hover:text-blue-300" href="/blog">Blog</a>
                <a class="hover:text-blue-300" href="/signin">Sign-in</a>
            </div>
        </div>
    </nav>

    <!-- Sign-In Container -->
    <div class="flex flex-grow items-center justify-center">
        <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-blue-700 text-center mb-6">Sign In</h2>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <button type="submit" id="signInButton" class="w-full bg-gray-500 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Sign In</button>
                <a href="#" class="block text-center text-blue-600 mt-4 hover:underline">Forgot password?</a>
            </form>

            <!-- Check if user is signed in -->
            @if(Auth::check())
                <button class="w-full bg-green-500 text-white py-2 rounded-lg mt-4">You are signed in</button>

                @if(Auth::user()->is_admin)
                    <button class="w-full bg-yellow-500 text-black py-2 rounded-lg mt-4">You are an Admin</button>
                @else
                    <button class="w-full bg-red-500 text-white py-2 rounded-lg mt-4">You are not an Admin</button>
                @endif

                <form action="{{ route('adopt.index') }}" method="GET">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg mt-4">See our available animals</button>
                </form>

                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg">Sign Out</button>
                </form>
            @else
                <button class="w-full bg-red-600 text-white py-2 rounded-lg mt-4">You are not signed in</button>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-4 text-center">
        <p class="text-sm">&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>

</body>
</html>

<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            margin: 15px 0;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #4CAF50;
        }
        main {
            padding: 20px;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Homepage!</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
        </nav>
    </header>
    
    <main>
        <h2>About This Page</h2>
        <p>This is a simple homepage built with Laravel Blade templating. Explore our website using the navigation links above!</p>
    </main>

    <footer>
        <p>&copy; 2024 Your Company Name</p>
    </footer>
</body>
</html>

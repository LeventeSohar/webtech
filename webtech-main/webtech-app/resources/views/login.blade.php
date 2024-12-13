<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/loginCard.css'])
    @endif
</head>
<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Login Card -->
    <div class="login-card" id="loginCard">
        <h3 class="text-center">Admin Login</h3>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <!-- JavaScript to toggle login card visibility -->
    <script>
        function toggleLoginCard() {
            const loginCard = document.getElementById('loginCard');
            const overlay = document.getElementById('overlay');
            loginCard.style.display = loginCard.style.display === 'block' ? 'none' : 'block';
            overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
        }
        // Open the login card by default for testing
        window.onload = toggleLoginCard;
    </script>
</body>
</html>

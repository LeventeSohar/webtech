<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Homepage!</h1>

 <!-- Success Message -->
 @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('submitForm') }}" method="POST">
        @csrf <!-- Include CSRF token for security -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
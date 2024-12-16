<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Story - Pet Shelter Flensburg</title>
    <meta name="description" content="Share your adoption story and read heartwarming stories from other users at Pet Shelter Flensburg.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
</head>
<style>
    .navbar {
            background-color: #0056b3;
            padding: 1rem;
        }
</style>
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


    <div class="container mt-5">
        <h1>Submit Your Story</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form for submitting a new post -->
        <form id="storyForm" action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="author" class="form-label">Name:</label>
                <input type="text" id="author" name="author" required class="form-control" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Story Title:</label>
                <input type="text" id="title" name="title" required class="form-control" placeholder="Enter a title for your story">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Your Story:</label>
                <textarea id="content" name="content" rows="5" required class="form-control" placeholder="Share your adoption story..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Display each post -->
        <h2 class="mt-5">Stories from Our Users</h2>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text"><strong>by {{ $post->author }}</strong></p>
                    <p class="card-text">{{ $post->content }}</p>

                    <!-- Check if the user is authenticated and is an admin -->
                    @if(Auth::check() && Auth::user()->is_admin)
                    <!-- Delete button for post -->
                    <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endif

                <div class="card-footer">
                    <h4>Comments</h4>
                    @if ($post->comments->isEmpty())
                        <p>No comments yet. Be the first to comment!</p>
                    @else
                    @foreach ($post->comments as $comment)
                    <div class="comment mb-2">
                        <p><strong>{{ $comment->name }}:</strong> {{ $comment->content }}</p>
                
                        <!-- Delete button for comment -->
                        @if(Auth::check() && Auth::user()->is_admin)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    @endif
                @endforeach
                
                    @endif

                    <!-- Comment Form -->
                    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="content-{{ $post->id }}" class="form-label">Your Comment:</label>
                            <textarea id="content-{{ $post->id }}" name="content" rows="3" class="form-control" placeholder="Write your comment here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
 <!-- Should this be removed? 
    @include('info-box')
    -->
    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Pet Shelter Flensburg - All Rights Reserved</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

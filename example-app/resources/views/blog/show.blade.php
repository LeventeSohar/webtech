@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <!-- Display the Post -->
    <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
    <p><strong>Author:</strong> {{ $post->author }}</p>
    <p class="mt-4">{{ $post->content }}</p>

    <!-- Display Comments Section -->
    <div class="mt-5">
        <h2 class="text-2xl font-semibold">Comments</h2>

        <!-- Loop through comments -->
        @foreach($post->comments as $comment)
            <div class="border p-3 mt-3 rounded-lg">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->comment }}</p>

                <!-- Allow admins to delete comments -->
                @if(Auth::check() && Auth::user()->is_admin)
                    <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Form to Add a New Comment -->
    <form action="{{ route('post.comment.store', $post) }}" method="POST" class="mt-5">
        @csrf
        <h2 class="text-xl font-semibold">Add a Comment</h2>

        <div class="mb-3">
            <label for="name" class="form-label">Your Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Your Comment:</label>
            <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Write your comment here..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>
@endsection

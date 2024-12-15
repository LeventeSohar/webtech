@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h2 class="text-4xl font-bold mb-4">{{ $post->title }}</h2>
    <p class="text-gray-700 mb-6">{{ $post->content }}</p>

    <hr class="my-6">

    <h3 class="text-2xl font-semibold mb-4">Comments</h3>
    <div class="space-y-4">
        @forelse ($post->comments as $comment)
            <div class="bg-gray-100 rounded p-4">
                <p class="font-bold">{{ $comment->name }}</p>
                <p class="text-gray-700">{{ $comment->comment }}</p>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse
    </div>

    <hr class="my-6">

    <h3 class="text-2xl font-semibold mb-4">Leave a Comment</h3>
    <form action="{{ url('/post/' . $post->id . '/comment') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" id="name" name="name" required class="w-full border-gray-300 rounded p-2">
        </div>
        <div>
            <label for="comment" class="block text-sm font-medium">Comment</label>
            <textarea id="comment" name="comment" required class="w-full border-gray-300 rounded p-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Submit</button>
    </form>
@endsection

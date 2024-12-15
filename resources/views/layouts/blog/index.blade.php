@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h2 class="text-4xl font-bold mb-6">Blog</h2>
    
    <div class="space-y-8">
        @foreach ($posts as $post)
            <div class="bg-white shadow rounded p-6">
                <h3 class="text-3xl font-semibold text-blue-600 mb-4">{{ $post->title }}</h3>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ $post->content }}
                </p>

                <div class="border-t pt-4">
                    <h4 class="text-xl font-bold mb-2">Comments</h4>
                    @forelse ($post->comments as $comment)
                        <div class="bg-gray-100 rounded p-4 mb-2">
                            <p class="font-semibold">{{ $comment->name }}</p>
                            <p class="text-gray-600">{{ $comment->comment }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No comments yet.</p>
                    @endforelse
                </div>

                <hr class="my-6">

                <form action="{{ url('/post/' . $post->id . '/comment') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name_{{ $post->id }}" class="block text-sm font-medium">Name</label>
                        <input type="text" id="name_{{ $post->id }}" name="name" required class="w-full border-gray-300 rounded p-2">
                    </div>
                    <div>
                        <label for="comment_{{ $post->id }}" class="block text-sm font-medium">Comment</label>
                        <textarea id="comment_{{ $post->id }}" name="comment" required class="w-full border-gray-300 rounded p-2"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Post Comment</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection

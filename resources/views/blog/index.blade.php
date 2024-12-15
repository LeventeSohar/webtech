<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Adoption Stories</h1>
    @foreach($posts as $post)
        <div class="border p-4 mb-4 rounded-lg">
            <h2 class="text-2xl font-semibold">{{ $post->title }}</h2>
            <p>{{ Str::limit($post->content, 150) }}</p>
            <a href="{{ route('post.show', $post) }}" class="text-blue-500">Read more</a>
        </div>
    @endforeach
</div>

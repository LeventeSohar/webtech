<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <div class="mt-8">
        <h2 class="text-xl font-semibold">Comments</h2>
        @foreach($post->comments as $comment)
            <div class="border p-4 mt-4 rounded-lg">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->comment }}</p>

                @can('delete', $comment)
                    <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                @endcan
            </div>
        @endforeach
    </div>

    <form action="{{ route('post.comment.store', $post) }}" method="POST" class="mt-8">
        @csrf
        <div class="mb-4">
            <input type="text" name="name" placeholder="Your Name" class="w-full p-2 border rounded" required />
        </div>
        <div class="mb-4">
            <textarea name="comment" placeholder="Your Comment" class="w-full p-2 border rounded" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Post Comment</button>
    </form>
</div>

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments')->get(); // Fetch posts with comments
        return view('blog.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($validated);

        return redirect()->route('blog.index')->with('success', 'Post submitted!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted!');
    }
}

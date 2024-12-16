<?php 

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:500', // Optional: limit comment size
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->name = 'Guest'; // Default to Guest if no user authentication is implemented
        $comment->post_id = $post->id;
        $comment->save();

        // Redirect back to the blog with a success message
        return redirect()->route('blog.index')->with('success', 'Comment posted!');
    }

    public function destroy($id)
{
    // Find the comment by ID
    $comment = Comment::findOrFail($id);

    // Delete the comment
    $comment->delete();

    // Redirect back with a success message
    return back()->with('success', 'Comment deleted successfully!');
}

}

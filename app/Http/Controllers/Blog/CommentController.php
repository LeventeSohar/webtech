<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\BlockedWord;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Check for blocked words
        $blockedWords = BlockedWord::all()->pluck('word')->toArray();
        foreach ($blockedWords as $blockedWord) {
            if (stripos($request->comment, $blockedWord) !== false) {
                return back()->withErrors(['comment' => 'Your comment contains inappropriate words.']);
            }
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'name' => $request->name,
            'comment' => $request->comment,
        ]);

        return back();
    }

    // Uncomment and complete the destroy method if you want to enable comment deletion
    // public function destroy(Comment $comment)
    // {
    //     $this->authorize('delete', $comment); // Check if the user is authorized to delete the comment
    //     $comment->delete();
    //     return back();
    // }
}

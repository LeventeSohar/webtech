<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes; // Enables soft deletes

    protected $fillable = ['author', 'title', 'content']; // Allow mass assignment for these fields

    // Relationship with Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class); 
    }

    // Optional: Scope for published posts
    public function scopePublished($query)
    {
        return $query->where('status', 'published'); // Ensure 'status' column exists in 'posts'
    }
}

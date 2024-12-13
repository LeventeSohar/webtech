<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Authenticatable to work with Auth
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory;

    // Specify the table if it isn't the default "admins"
    protected $table = 'admins';

    // Allow mass assignment for these fields
    protected $fillable = ['name', 'password'];

    // Disable timestamps if your admins table doesn’t have created_at and updated_at
    public $timestamps = false;

    // Automatically hash passwords when setting them
    
}

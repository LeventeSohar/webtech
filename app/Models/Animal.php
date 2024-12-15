<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'size',
        'age',
        'color',
        'description',
        'garden_needed',
        'picture',
    ];

    public $timestamps = true;  //for filtering of how long animals have been in shelter!!
}

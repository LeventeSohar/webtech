<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'type', 'size', 'age', 'color', 'description', 'garden_needed', 'picture',
    ];
}


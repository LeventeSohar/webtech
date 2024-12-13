<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'type',
        'description',
        'image',
    ];

    // Define constants for the type of animal
    public const TYPE_DOG = 1;
    public const TYPE_CAT = 2;
    public const TYPE_BIRD = 3;
    public const TYPE_OTHER = 4;

    // Accessor for type name
    public function getTypeNameAttribute()
    {
        return match ($this->type) {
            self::TYPE_DOG => 'Dog',
            self::TYPE_CAT => 'Cat',
            self::TYPE_BIRD => 'Bird',
            self::TYPE_OTHER => 'Other',
            default => 'Unknown',
        };
    }

}



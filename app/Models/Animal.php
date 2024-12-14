<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    // Optionally, specify the table name if it differs from the plural of the model name
    // protected $table = 'animals';

    protected $fillable = [
        'name', 'species', 'breed', 'gender', 'date_of_birth', 'date_of_arrival', 
        'color', 'weight', 'is_neutered', 'is_vaccinated', 'is_microchipped',
        'microchip_number', 'medical_history', 'special_needs', 'personality_traits',
        'is_adoptable', 'adoption_date', 'adopted_by', 'surrendered_by', 'notes', 
        'profile_picture', 'gallery', 'created_by', 'updated_by', 'admin_comments',
    ];

    // You can define relationships here if needed
    // public function adoptedBy() { return $this->belongsTo(User::class, 'adopted_by'); }
}

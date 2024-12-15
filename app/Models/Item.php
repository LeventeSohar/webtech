<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'quantity'];
}

//Item::create([
//     'name' => 'Example Item',
//     'description' => 'This is a description.',
//     'price' => 19.99,
//     'quantity' => 100,
// ]);

//$items = Item::all();

// $item = Item::find(1);
// $item->update(['price' => 24.99]);

// $item = Item::find(1);
// $item->delete();

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Get products related to parent category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Add orders one to many relationship
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

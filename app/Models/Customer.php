<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //     // Add orders one to many relationship
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Defining the full name accessor
    public function getFullNameAttributes()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}

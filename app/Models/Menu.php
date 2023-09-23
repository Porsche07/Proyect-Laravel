<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['cuisine_type', 'photo', 'description', 'price'];

    // Define las relaciones con otros modelos, si es necesario
}

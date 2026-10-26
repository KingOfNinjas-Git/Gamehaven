<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title',
        'cover_image',
        'price',
        'discount',
        'old_price',
        'category',
    ];
}

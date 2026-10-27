<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** The categories in the offers page filter ("Featured" shows every game). */
    public const CATEGORIES = [
        'Featured', 'Action-Adventure', 'Arcade', 'Casual', 'Action',
        'Open-World', 'RPG', 'Horror', 'Strategy', 'Hack & Slash', 'Shooter', 'Racing',
    ];

    protected $fillable = [
        'title',
        'cover_image',
        'price',
        'discount',
        'old_price',
        'category',
    ];

    /** Games in one category; "Featured" (or no category) means all of them. */
    public function scopeInCategory($query, ?string $category)
    {
        return $query->when($category && $category !== 'Featured', fn ($q) => $q->where('category', $category));
    }

    /** The discount as it is shown: 40 for 40.00 and 12.5 for 12.50, never "4" for 40. */
    public function discountLabel(): string
    {
        return rtrim(rtrim(number_format((float) $this->discount, 2, '.', ''), '0'), '.');
    }
}

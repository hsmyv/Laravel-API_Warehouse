<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_buy',
        'price_sold',
        'category_id',
        'quantity',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouseproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sender_warehouse_id',
        'receiver_warehouse_id',
        'quantity'
    ];
}

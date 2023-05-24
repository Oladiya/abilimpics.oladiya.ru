<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'product_id',
        'col',
        'address',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

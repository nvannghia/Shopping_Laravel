<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'amount',
        'city',
        'district',
        'ward',
        'phone_number',
        'delivery_note',
        'user_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_detail', 'order_id', 'product_id')
            ->withPivot('unit_price', 'quantity');
    }
}

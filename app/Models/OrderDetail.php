<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 'product_variant_id', 'quantity', 'price',
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function product()
    {
        return $this->productVariant->product();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

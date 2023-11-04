<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $fillable = [
        'sale_id',
        'product_id',
        'sade_quantity',
        'sade_price',
        'sade_discount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

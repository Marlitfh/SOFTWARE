<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
        'purchase_id',
        'product_id',
        'pude_quantity',
        'pude_price',
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

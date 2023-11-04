<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['prod_code', 'prod_name', 'prod_stock', 'prod_image', 'prod_price', 'prod_status', 'prod_expiration', 'prod_status_cant', 'category_id',];
   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

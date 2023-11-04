<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStateDetail extends Model
{
    protected $fillable = ['prod_stat_deta_date','product_id', 'product_state_id', 'prod_stat_deta_prod_expiration', 'prod_stat_deta_cantidad',];
    // protected $fillable = ['prod_code', 'prod_name', 'prod_stock','category_id',];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productstate()
    {
        return $this->belongsTo(ProductState::class);
    }
}

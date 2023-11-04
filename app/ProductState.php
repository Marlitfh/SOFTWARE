<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductState extends Model
{
    //
    protected $fillable= ['prod_stat_state'];

    public function productstateDetails()
    {
        return $this->hasMany(ProductStateDetail::class);
    }

}


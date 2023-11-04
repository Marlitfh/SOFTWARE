<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cate_name','cate_description',];

    public function product(){
        return $this->hasMany(Product::class);
    }
}

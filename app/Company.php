<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['comp_name','comp_description','comp_logo','comp_email','comp_address','comp_ruc',];
}

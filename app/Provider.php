<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['prov_name', 'prov_email', 'prov_ruc', 'prov_address', 'prov_phone',];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['clie_name','clie_dni','clie_ruc','clie_address','clie_phone','clie_email'];
}

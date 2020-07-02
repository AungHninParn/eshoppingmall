<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes;
    protected $fillable=['shop_name','category_id'];


}

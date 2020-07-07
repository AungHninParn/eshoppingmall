<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable=['name','codeno','photo','price','discount','description','seller_id'];

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}


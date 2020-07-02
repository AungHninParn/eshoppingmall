<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $fillable=['name','codeno','photo','price','discount','description','category_id','seller_id'];

     public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

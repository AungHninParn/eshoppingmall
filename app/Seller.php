<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{

	 use SoftDeletes;
    protected $fillable=['name','category_id','user_id'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

}

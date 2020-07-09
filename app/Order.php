<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable=['orderdate','voucherno','total','note','status','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function products()
    {
    	//orderdetails =table's name
    	return $this->belongsToMany('App\Product','orderdetails','order_id','product_id')
    	->withPivot('qty')->withTimestamps();
    }
}


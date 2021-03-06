<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable=['name'];


    public function sellers()
    {
        return $this->hasMany('App\Seller');
    }


}

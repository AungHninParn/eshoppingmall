<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Product extends Model implements Searchable
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
        public function getSearchResult(): SearchResult
    {
        $url = route('product', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $this->photo,
            
           
            $url
        );
    }
}


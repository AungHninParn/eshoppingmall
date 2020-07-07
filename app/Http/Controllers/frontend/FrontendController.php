<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontendController extends Controller
{
    public function index($value=''){
    	$categories=Category::all();
    	$products=Product::all();
    	return view('frontend.index',compact('categories','products'));
    }
    public function product($value=''){
    	$categories=Category::all();
    	$allproducts=Product::all();
    	return view('frontend.product',compact('allproducts','categories'));
    }
    public function detail($id)
    {
        $product=Product::find($id);
        //recommendItems=Item::where('discount',0)->take(5)->get();
        $relatedProducts=Product::where('seller_id',$product->seller_id)->take(4)->get();
        return view('frontend.product_detail',compact('product','relatedProducts'));
    }

    public function cart($value='')
    {
        return view('frontend.cart');
    }
}

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
}

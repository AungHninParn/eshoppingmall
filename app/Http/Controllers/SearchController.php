<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$request->validate(['query'=> 'required|min:3']);
    	$search=$request->search;
    	//find product
    	if($search==1){
    		$request->validate(['query'=> 'required|min:3']);
			$query=$request->input('query');
    		$products=Product::where('name','like',"%$query%")->get();
	    	//dd($products);
    		return view('backend.products.index',compact('products'));
    	}
    	//find seller
    	elseif ($search==2) {
    		$q=$request->input('query');
    		$users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'seller');
            })->where('name','like',"%$q%")->get();
    
    	return view('backend.sellers.index',compact('users'));
    	}
    	//find customer
    	elseif($search==2){
		$request->validate(['query'=> 'required|min:3']);
    	$q=$request->input('query');
    	$users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'customer');

            })->where('name','like',"%$q%")->get();
    
		return view('backend.customers.index',compact('users'));
    	}
        //find category
        else{
            $request->validate(['query'=> 'required|min:3']);
            $query=$request->input('query');
            $categories=Category::where('name','like',"%$query%")->get();
            return view('backend.categories.index',compact('categories'));
        }

    }
}

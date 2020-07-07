<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Seller;

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

    public function shop($value=''){



    	$sellers=Seller::all();
    	$product=Product::orderBy('id','desc')->get();

    	return view('frontend.shop',compact('sellers','product'));


    
    }
    public function store(Request $request)
    {
         //validation
        $request->validate(['name'=> 'required|min:5|max:191','codeno'=>'required','price'=>'required','discount'=>'required','description'=>'required',
            'photo'=>'required|mimes:jpeg,bmp,png']);

        //file upload
        $imageName= time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'),$imageName);
        $filepath='images/'.$imageName;


        //data insert
        $product=new Product;
        $product->name=$request->name;
        $product->codeno=$request->codeno;
        $product->photo=$filepath;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->description=$request->description;
       

        $product->seller_id=$request->seller_id;

        $product->save();

        //return
        return redirect()->route('shop');
        
    }

        public function contact($value=''){
    
    	return view('frontend.contact');
    }

        public function about($value=''){
    
    	return view('frontend.about');
    }


}

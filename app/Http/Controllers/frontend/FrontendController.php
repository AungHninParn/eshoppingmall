<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Seller;
use App\User;
use Spatie\Searchable\Search;

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
        $relatedProducts=Product::where('seller_id',$product->seller_id)->take(4)->get();
        return view('frontend.product_detail',compact('product','relatedProducts'));
    }

    public function cart($value='')
    {
        return view('frontend.cart');
    }

    public function shop($id){

    	$seller=Seller::where('user_id',$id)->get();
              
        foreach ($seller as $key => $value) {
        $seller_id =$value['id'];
        $shop_name=$value['name'];
       }
    	$product=Product::where('seller_id',$seller_id)->orderBy('id','desc')->get();
       
    	return view('frontend.shop',compact('product','shop_name','seller_id'));
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
        $product->seller_id = $request->seller_id;
        $product->save();

        $id=Auth::id();
     
        //return
        return redirect()->route('shop',[$id]); 
    }

        public function edit($id)
    {
        $product=Product::find($id);
        
        return view('shop',compact('product')); 
    }

    public function update(Request $request, $id)
    {
        //validation
         $request->validate(['name'=> 'required|min:5|max:191',
            'codeno'=>'required','price'=>'required','discount'=>'required','description'=>'required',
            'photo'=>'sometimes|mimes:jpeg,bmp,png']);

        //file upload
        if($request->hasFile('photo')){
            $imageName= time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'),$imageName);
          //  unlink($request->oldphoto);
            $filepath='images/'.$imageName;
        }else{
            $filepath=$request->oldphoto;
        }

        //data update
        $item=Product::find($id);
        $item->name=$request->name;
        $item->codeno=$request->codeno;
        $item->photo=$filepath;
        $item->price=$request->price;
        $item->discount=$request->discount;
        $item->description=$request->description;

        $product->seller_id = $request->seller_id;
      
        $item->save();

        //return
        return redirect()->route('shop');
    }

        public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('shop');
    }



    public function contact($value='')
    {    
    	return view('frontend.contact');
    }

    public function about($value='')
    {    
    	return view('frontend.about');
    }
    

    public function search(Request $request)
    {
       
        $searchResults = (new Search())
            
            ->registerModel(Product::class, 'name')
            ->perform($request->input('query'));
            // dd($searchResults);
            // die();
        return view('frontend.search', compact('searchResults'));
    }
    
    public function orderlist($id)
    {   
        $seller_id = DB::table('sellers')->where('user_id',$id)->value('id');
       
       
        $list = DB::table('orderdetails')
            ->join('products', 'orderdetails.product_id', '=', 'products.id')
            ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
            ->join('users','users.id','=','orders.user_id')
            ->where('products.seller_id',$seller_id)
            ->select('orders.id', 'products.name as pname', 'orderdetails.qty', 'products.price',  'users.name as uname','users.phone')
            ->get();

      //    dd($list);

        return view('frontend.orderlist',compact('list'));
    }


}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

use App\Seller;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $sellers=Seller::all();
        $cate=Category::all();
        return view('backend.products.create',compact('sellers','cate'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
<<<<<<< HEAD
=======
       
>>>>>>> 0b850d4a81185573c3efd125ebbdcfa642fc93bb

        $product->seller_id=$request->seller_id;

        $product->save();

        //return
        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $sellers=Seller::all();
        return view('backend.products.edit',compact('product','sellers'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


        $item->seller_id=$request->seller_id;
        $item->save();

        //return
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}

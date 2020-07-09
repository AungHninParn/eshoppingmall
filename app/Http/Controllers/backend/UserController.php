<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        $user=User::find($id);
        
        $lists = DB::table('orderdetails')
            ->join('products', 'orderdetails.product_id', '=', 'products.id')
            ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
            ->join('sellers','sellers.id','=','products.seller_id')
            ->where('orders.user_id',$id)
            
            ->select('orders.orderdate', 'products.name as name', 'sellers.name as shopname', 'orderdetails.qty',  'products.price')
            ->get();

        return view('frontend.userprofile',compact('user','lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'phone'=>'required','address'=>'required']);

        
        //data update
        $user=User::find($id);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->address=$request->address;

        $user->save();

        //return
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

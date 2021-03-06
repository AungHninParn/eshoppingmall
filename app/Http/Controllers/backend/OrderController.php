<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Seller;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NotiMessage;
use Illuminate\Support\Facades\Auth;




class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
        return view('backend.orders.index',compact('orders'));
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
        $loStr=json_decode($request->data);
        $total=0;
        $username = Auth::user();
        $user_id=Auth::id();
        $sellers_idArr=array();


        foreach ($loStr as $row) {
            $total+=$row->price*$row->qty;

            if (!in_array($row->sellerid,$sellers_idArr)) {
                array_push($sellers_idArr, $row->sellerid);
            }
            
        }
     //   var_dump($sellers);

        foreach ($sellers_idArr as $seller_id) {


            $seller= Seller::find($seller_id); 

             $notiMessage = [
                'user_name' =>$username['name'],
                'body' => 'my test',
                'seller_id'=>$seller->id,
            ];
            $userID=$seller->user_id;//user id of seller
            $user=User::find($userID);
            $user->notify(new NotiMessage($notiMessage));
        }

        $order=new Order;
        $order->orderdate=date('Y-m-d');//date format in migration table
        $order->voucherno=uniqid();
        $order->total=$total;
        $order->note=$request->note;
        $order->status=0;
        $order->user_id=$user_id;
        $order->save();

        foreach ($loStr as $value) {
            $order->products()->attach($value->id,['qty'=>$value->qty]);

        }
        
        
  
   
        return response()->json([
            'status'=>'Order Successfully created'
        ]);
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
        //
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

@extends('frontend.master')
@section('content')

<div class="container">
	<h1 class="text-center">Your Order List</h1>
    <table class="table table-borderless main" style="border-spacing: 0 11px !important; border-collapse: separate !important;
  ">
        <thead>
            <tr class="head">

                <th scope="col">Order ID</th>
                <th scope="col">product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Customer_id</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($list as $row)
            <tr class="rounded bg-primary">
              <td>{{$row->order_id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->qty}}</td>
                <td>{{$row->price}}</td>
                <td>{{$row->user_id}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

@endsection
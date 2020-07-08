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
                <th scope="col">Customer</th>
                <th scope="col">Size</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                

            </tr>
        </thead>
        <tbody>
            <tr class="rounded bg-primary">
             
                <td class="order-color">121 091</td>
                <td>Sneaker</td>
                <td class="d-flex align-items-center"> <img src="https://i.imgur.com/C4egmYM.jpg" class="rounded-circle" width="25"> <span class="ml-2">Harrient Santigo</span> </td>
                <td>
                	L
                </td>
                <td>2</td>
                <td>182.40Ks</td>
               
              

            </tr>
            <tr class="rounded bg-primary">
             
                <td class="order-color">121 091</td>
                <td>Sneaker</td>
                <td class="d-flex align-items-center"> <img src="https://i.imgur.com/C4egmYM.jpg" class="rounded-circle" width="25"> <span class="ml-2">Harrient Santigo</span> </td>
                <td>
                	L
                </td>
                <td>2</td>
                <td>182.40Ks</td>
               
              

            </tr>
        </tbody>
    </table>
</div>



@endsection
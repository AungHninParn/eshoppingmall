@extends('frontend.master')
@section('content')
  <div class="container">
    <div class="row">
	    
    	<div class="col-lg-8">
    			<div class="card">
		    		<table class="table">
		    			<thead>
		    			
		    				<th>Name</th>
		    				<th>Price</th>
		    				<th>Quantity</th>
		    				<th>Subtotal</th>
		    			</thead>
		    			<tbody id="cart_table"></tbody>
		    			
		    		</table>
		    		</div>
		    		
	    </div>

	    <div class="col-lg-4">
            <!-- Card -->
            <div class="card mb-3">
              <div class="card-body" id="shoppingcart_tfoot">

                <h5 class="mb-3">The total amount of your cart</h5>
                <hr>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Total amount
                    <span id="total" class="text-danger"></span>
                  </li>
                  
                </ul>
                <hr>
                <input type="text" class="form-control mb-4" placeholder="Enter Note" name="note" id="note">
                <button class="btn btn-primary btn-block waves-effect waves-light checkout_btn" data-total=${total} >go to checkout</button>

            </div>
          </div>
    </div>
       

    </div>

   </div>

@endsection
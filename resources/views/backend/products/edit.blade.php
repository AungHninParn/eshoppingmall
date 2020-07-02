@extends('backend.master')

@section('content')

   <h1 class="h3 mb-2 text-primary">Edit Form </h1>

	<div class="card">
		<div class="card-header">
			<h6 class="text-primary">Edit Product</h6>
		</div>
		<div class="card-body">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                               <div class="form-group">
                    <label class="bmd-label-floating">Code No.</label>
                    <input type="text" class="form-control" name="codeno" value="{{$product->codeno}}">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Discount</label>
                    <input type="text" class="form-control" name="discount" value="{{$product->discount}}">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$product->description}}">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Seller</label>
                    <select class="custom-select mr-sm-2" name="seller_id">
						    <option selected>Choose Seller</option>
					        @foreach($sellers as $row)
				        	<option value="{{$row->id}}" @if($row->id==$product->seller_id) {{'selected'}}@endif>{{$row->name}}</option>
				        			
					        @endforeach
					</select>
                </div>
                <div class="form-group">
                    <label class="bmd-label-floating">Seller</label>
                    <input type="text" class="form-control" name="seller_id" value="{{$product->seller_id}}">
                </div>

                <label for="photo">Photo</label>
                		<nav>
  							<div class="nav nav-tabs" id="nav-tab" role="tablist">
	    						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
	    						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
    						</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
				            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						  	
							  	<img src="{{asset($product->photo)}}" class="img-fluid w-25">
							  	<input type="hidden" name="oldphoto" value="{{$product->photo}}">
						    </div>
						    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						       	<input type="file" class="form-control-user" name="photo" id="photo" accept="image/*">	
							</div>
						</div>


				<div class="">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>

@endsection
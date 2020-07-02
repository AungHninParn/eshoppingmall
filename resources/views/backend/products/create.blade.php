@extends('backend.master')

@section('content')
       	
   <h1 class="h3 mb-2 text-primary">Product Form </h1>

	<div class="card">
		<div class="card-header">
			<h6 class="text-primary">Create Product</h6>
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
			<form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                
                    
                    <input  type="file" name="photo" accept="image/*">
                </div>


                <div class="form-group">
                    <label class="bmd-label-floating">Code No.</label>
                    <input type="text" class="form-control" name="codeno">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Discount</label>
                    <input type="text" class="form-control" name="discount">
                </div>
				<div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
				<div class="form-group">

                    <label class="bmd-label-floating">Seller</label>
                    <select class="custom-select mr-sm-2" name="seller_id">
						    <option selected>Choose Seller</option>
					        @foreach($sellers as $row)

				        	<option value="{{$row->id}}">{{$row->name}}</option>
					        @endforeach
					</select>
                </div>


                <label for="photo">Photo</label>
                <input type="file" class="form-control-user" name="photo" id="photo" accept="image/*">

				<div class="">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@extends('backend.master')

@section('content')
       	
   <h1 class="h3 mb-2 text-primary">Product Form </h1>

	<div class="card">
		<div class="card-header">
			<h6 class="text-primary">Create Product</h6>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                @error('name')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror

                <div class="form-group">
                    <label class="bmd-label-floating">Code No.</label>
                    <input type="text" class="form-control" name="codeno">
                </div>
                @error('codeno')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror

				<div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                @error('price')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror

				<div class="form-group">
                    <label class="bmd-label-floating">Discount</label>
                    <input type="text" class="form-control" name="discount">
                </div>
                @error('discount')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror

				<div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>

                @error('description')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
                				

				<div class="form-group">
                    <label class="bmd-label-floating">Seller</label>
                    <select class="custom-select mr-sm-2" name="seller_id">
						    <option selected>Choose Seller</option>
					        @foreach($sellers as $row)

				        	<option value="{{$row->id}}">{{$row->name}}</option>
					        @endforeach
					</select>
                </div>
                @error('seller')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror


                <label for="photo">Photo</label>
                <input type="file" class="form-control-user" name="photo" id="photo" accept="image/*">
                @error('photo')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror

				<div class="">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
@endsection
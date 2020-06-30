@extends('backend.master')

@section('content')

   <h1 class="h3 mb-2 text-primary">Edit Form </h1>

	<div class="card">
		<div class="card-header">
			<h6 class="text-primary">Edit Category</h6>
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
			<form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>



				<div class="">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>

@endsection
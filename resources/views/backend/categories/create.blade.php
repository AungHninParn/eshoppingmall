@extends('backend.master')

@section('content')
       	
   <h1 class="h3 mb-2 text-primary" style="display: inline;margin-right: 70%;">Category Form </h1>
   <a href="{{route('categories.index')}}" >
               <i class="material-icons">west</i> 
              </a>

	<div class="card">
		<div class="card-header">
			<h6 class="text-primary" >Create Category</h6>
			
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
			<form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>



				<div class="">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
@endsection
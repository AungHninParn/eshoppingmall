@extends('backend.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          	<div class="card-header card-header-primary">
            	<h4 class="card-title" style="display: inline;margin-right: 70%;">Category Table</h4>
            	<a href="{{route('categories.create')}}" >+</a>
            	
          	</div>
          	<div class="card-body">
            	<div class="table-responsive">
               		<table class="table">
                    	<thead class="text-primary">
                        	<th>
                          		No.
                        	</th>
                       		<th>
                          		Name
                        	</th>
							<th>
								Action
							</th>	
                    	</thead>
                    	<tbody>
                    		@php $i=1; @endphp
                        	@foreach($categories as $category)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$category->name}}</td>
                          <td>
							<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning" style="float: left;">Edit</a>
							
							<form action="{{route('categories.destroy',$category->id)}}" method="post" onsubmit="return confirm('Are you sure?')"> 
								@csrf
								@method('DELETE')
								<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
							</form>
						  </td>
                        </tr>
                        @endforeach
                    	</tbody>
                	</table>
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection
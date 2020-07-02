@extends('backend.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          	<div class="card-header card-header-primary">
            	<h4 class="card-title " style="display: inline;margin-right:70%;">Product Table</h4>
            	<a href="{{route('products.create')}}" >+</a>
            	
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
                        		Email
                        	</th>
                        	<th>
                        		Phone
                        	</th>
                        	<th>
                        		Address
                        	</th>
                        	<th>
								Action
							</th>	
                    	</thead>
                    	<tbody>
                    		@php $i=1; @endphp
                        	@foreach($products as $product)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->codeno}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->discount}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->seller->name}}</td>
                          <td>
							<a href="{{route('products.edit',$product->id)}}"  class="btn btn-warning" style="float: left;">Edit</a>
							
							<form action="{{route('products.destroy',$product->id)}}" method="post" onsubmit="return confirm('Are you sure?')"> 
								@csrf
								@method('DELETE')
								<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
							</form>
						  </td>
                        </tr>
                        @endforeach
                    	</tbody>
                    	<tfoot class="text-primary">
                    		<th>
                          		No.
                        	</th>
                       		<th>
                          		Name
                        	</th>
                        	<th>
                        		Email
                        	</th>
                        	<th>
                        		Phone
                        	</th>
                        	<th>
                        		Address
                        	</th>
                        	<th>
								Action
							</th>	
                    	</tfoot>
                	</table>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
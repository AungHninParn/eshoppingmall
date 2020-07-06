@extends('backend.master')

@section('search')
            <form class="navbar-form" action="{{route('search')}}" method="GET">
              <div class="input-group no-border">
                <input type="hidden" name="search" value="2">
                <input type="text" value="{{request()->input('query')}}" name="query" class="form-control" placeholder="Search in name">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          	<div class="card-header card-header-primary">
            	<h4 class="card-title " style="display: inline;margin-right:70%;"><a href="{{route('sellers.index')}}">Seller Table</a></h4>

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
                        	@foreach($users as $user)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->address}}</td>
                        
                          <td>
						
							
							<form action="{{route('customers.destroy',$user->id)}}" method="post" onsubmit="return confirm('Are you sure?')"> 
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
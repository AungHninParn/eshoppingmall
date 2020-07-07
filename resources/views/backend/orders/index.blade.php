@extends('backend.master')


@section('content')
<div class="row">
    
    <div class="col-md-12">
        <div class="card">
          	<div class="card-header card-header-primary">
            	<h4 class="card-title " style="display: inline;margin-right:70%;"><a href="{{route('orders.index')}}">Customer Table</a></h4>
          	</div>
          	<div class="card-body">
            	<div class="table-responsive">
               		<table class="table">
                    	<thead class="text-primary">
                        	
                            <th>No</th>
                            <th>Order Date</th>
                            <th>Voucher No.</th>
                            <th>Total</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Customer</th>
                          
                    	</thead>
                      <tbody>
          @php $i=1; @endphp

          @foreach($orders as $row)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$row->orderdate}}</td>
            <td>{{$row->voucherno}}</td>
            <td>{{$row->total}}</td>
            <td>{{$row->note}}</td>
            <td>{{$row->status}}</td>
            <td>{{$row->user->name}}</td>
            
          </tr>
          @endforeach
        </tbody>

                    	<tfoot class="text-primary">
                        <tr>
                          <th>No</th>
                          <th>Order Date</th>
                          <th>Voucher No.</th>
                          <th>Total</th>
                          <th>Note</th>
                          <th>Status</th>
                          <th>Customer</th>
                        </tr>
     
                    	</tfoot>
                	</table>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
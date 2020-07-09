@extends('frontend.master')

@section('content')

<div class="container">
    <h1 class="text-center">Your Details</h1>
    <div class="row m-y-2">
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>

                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
                @role('customer')
                <li class="nav-item">
                    <a href="" data-target="#order" data-toggle="tab" class="nav-link">Your Orders</a>
                </li>
                @endrole
            </ul>

            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h4 class="m-y-2 my-3">Your Profile</h4>
                    <table class="table">
                        <tr><td>Name</td><td>{{$user->name}}</td></tr>
                        <tr><td>Email</td><td>{{$user->email}}</td></tr>    
                        <tr><td>Phone</td><td>{{$user->phone}}</td></tr>
                        <tr><td>Address</td><td>{{$user->address}}</td></tr>
                    </table>
                </div>

                <div class="tab-pane" id="edit">
                    <h4 class="m-y-2 my-3">Edit Profile</h4>
    <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                </div>
                <div class="form-group">
                    <label class="bmd-label-floating">Address</label>
                    <input type="text" class="form-control" name="address" value="{{$user->address}}">
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

                </div>

               
                <div class="tab-pane" id="order">
                <h4 class="m-y-5 mt-3">Order History</h4>
                <table class="table table-border" style="border-spacing: 0 11px !important; border-collapse: separate !important; ">
                    <thead>
                        <tr class="head text-center text-primary">

                            <th scope="col">Date</th>
                            <th scope="col">Product</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
            <tbody>
                @foreach($lists as $list)
            <tr class="rounded bg-grey text-center">
             
                <td class="order-color">{{$list->orderdate}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->shopname}}</td>
            
                <td>{{$list->qty}}</td>
                <td>{{$list->price}}Ks</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
            </div>
        </div>
  </div>
</div>
<hr>

@endsection
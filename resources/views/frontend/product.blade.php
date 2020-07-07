@extends('frontend.master')
@section('content')

<section class="bgwhite p-t-55 p-b-65">
        <div>
      <h2 class="text-center">All Products</h2>
      </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
            <h4 class="m-text14 p-b-7">
              Categories
            </h4>
            @foreach ($categories as $row)
            <ul class="p-b-54">
              <li class="p-t-4">
                <a href="#" class="s-text13 active1">
                  {{$row->name}}
                </a>
              </li>

            </ul>
            @endforeach
          </div>
          @foreach ($allproducts as $row)
          <div class="col-lg-3">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">{{$row->name}}
                  <p class="card-text">{{$row->price}}Ks</p>
                </div>
          
              <div class="card-img">
                <a href="{{route('detail',$row->id)}}">
                  <img src="{{asset($row->photo)}}" style="width: 252px; height: 200px;">
                </a>
                <div class="card-footer bg-transparent border-success text-center"><a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>

            </div>
          </div>
          @endforeach

          </div>
        </div>
</section>
@endsection
@extends('frontend.master')
@section('content')
<div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>
<div class="row">
@foreach ($searchResults as $row)
          <div class="col-lg-3">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">{{$row->title}}
                </div>
          

              <div class="card-img">
              
                <a href="">
                  <img src="{{asset($row->url)}}" style="width: 285px; height: 250px;">
                </a>
                
                <div class="card-footer bg-transparent border-success text-center"><a href="#" class="btn btn-indigo">Add to Cart</a>
                </div>
              </div>


            </div>
          </div>
          @endforeach
          </div>


@endsection
@extends('frontend.master')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card text-center">

         <div class="card-body">
          <h5 class="card-title">Sell Your Products</h5>
          <p class="card-text">Make money by sell your products at our e-shopping mall. For joined us thank you so much.</p>
         <form method="post" action="/create" enctype="multipart/form-data">

				@csrf
          <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sell Your Products</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-3">
                  <input type="hidden" name="seller_id" value="{{$seller_id}}">

                  <input type="text" id="form34" class="form-control validate" name="name">
                  <label data-error="wrong" data-success="right" for="form34">Product name</label>
                </div>
                  <div class="md-form mb-3">
                  <label for="form34" class="">
                  
                  </label>

                  <input type="file" id="form34" class="form-control" name="photo">
             
          
                
                  
                </div>
                   <div class="md-form mb-3">

                  <input type="text" id="form34" class="form-control validate" name="codeno">
                  <label data-error="wrong" data-success="right" for="form34">Codeno</label>
                </div>

            

                <div class="md-form mb-3">

                  <input type="text" id="form32" class="form-control validate"
                  name="price">
                  <label data-error="wrong" data-success="right" for="form32">Product Price</label>
                </div>
                <div class="md-form mb-3">

                  <input type="text" id="form32" class="form-control validate"
                  name="discount">
                  <label data-error="wrong" data-success="right" for="form32">Discount</label>
                </div>

                <div class="md-form mb-3">

                  <textarea type="text" id="form8" class="md-textarea form-control" rows="4" name="description"></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Description</label>
                </div>



              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo">Post<i class="fas fa-paper-plane-o ml-1"></i></button>
              </div>
            </div>
          </div>
        </div>
        </form>

        <div class="text-center">
          <a href="" class="btn btn-indigo btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Post Your Products</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




<section class="details-card mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h3 class="text-center" >Recent Products</h3>
      </div>
      <div class="col-md-8">
       <hr class="hr-dark">

     </div>
   </div>
   <div class="row">
   	@foreach ($product as $row)
    <div class="col-md-3">
      <div class="card border-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">{{$row->name}}
          <p class="card-text">{{$row->price}}Ks</p></div>
          
          <div class="card-img">
            <img src="{{asset($row->photo)}}" style="width: 252px; height: 200px;">
            <div class="card-footer bg-transparent border-primary">

              <a href="{{route('edit',$row->id)}}" class="btn btn-indigo" data-toggle="modal" data-target="#mContactForm">Edit</a>

              <form action="{{route('delete',$row->id)}}" method="post" > 
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You sure delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Sure</button>
      </div>
    </div>
  </div>
</div>
              </form>
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
    
            <form method="post" action="'update',$row->id" enctype="multipart/form-data">
        @csrf
        @method('PUT')

          <div class="modal fade" id="mContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-danger">Edit Your Products</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-3">

                  <input type="text" id="form34" class="form-control validate" name="name" value="{{$row->name}}">
                  <label data-error="wrong" data-success="right" for="form34">Product name</label>
                </div>
                  <div class="md-form mb-3">
                  <label for="form34" class="">
                 
                  </label>    
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
            </li>

          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"><img src="{{asset($row->photo)}} " id="oldpic" class="img-fluid w-25">
              <input type="hidden" name="oldphoto" value="{{$row->photo}}"></div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" name="photo"></div>

          </div>
             
          
                
                  
                </div>
                   <div class="md-form mb-3">

                  <input type="text" id="form34" class="form-control validate" name="codeno" value="{{$row->codeno}}">
                  <label data-error="wrong" data-success="right" for="form34">Codeno</label>
                </div>

            

                <div class="md-form mb-3">

                  <input type="text" id="form32" class="form-control validate"
                  name="price" value="{{$row->price}}">
                  <label data-error="wrong" data-success="right" for="form32">Product Price</label>
                </div>
                <div class="md-form mb-3">

                  <input type="text" id="form32" class="form-control validate"
                  name="discount" value="{{$row->discount}}">
                  <label data-error="wrong" data-success="right" for="form32">Discount</label>
                </div>

                <div class="md-form mb-3">

                  <textarea type="text" id="form8" class="md-textarea form-control" rows="4" name="description" value="{{$row->description}}" ></textarea>
                  <label data-error="wrong" data-success="right" for="form8">Description</label>
                </div>



              </div>
              <div class="modal-footer d-flex ">
                <button class="btn btn-warning">Cancel<i class="fas fa-paper-plane-o ml-1"></i></button>
             
                <button class="btn btn-success">Update<i class="fas fa-paper-plane-o ml-1"></i></button>
              </div>
            </div>
          </div>
        </div>
        </form>
        
  </div>
</section>



@endsection
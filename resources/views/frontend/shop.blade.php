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

                  <input type="text" id="form34" class="form-control validate" name="name">
                  <label data-error="wrong" data-success="right" for="form34">Product name</label>
                </div>
                                <div class="md-form mb-3">

                  <input type="file" id="form34" class="form-control validate" name="photo">
                  <label data-error="wrong" data-success="right" for="form34">Product Photo</label>
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

                <div class="md-form mb-3">

                  <label data-error="wrong" data-success="right" for="form32"></label>
                                      <select class="custom-select mr-sm-2" name="seller_id">
						    <option selected>Choose Seller</option>
					        @foreach($sellers as $row)

				        	<option value="{{$row->id}}">{{$row->name}}</option>
					        @endforeach
					</select>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique">Post<i class="fas fa-paper-plane-o ml-1"></i></button>
              </div>
            </div>
          </div>
        </div>
        </form>

        <div class="text-center">
          <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Post Your Products</a>
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
      <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">{{$row->name}}
          <p class="card-text">{{$row->price}}Ks</p></div>
          
          <div class="card-img">
            <img src="{{asset($row->photo)}}" style="width: 252px; height: 200px;">
            <div class="card-footer bg-transparent border-success text-center"><a href="#" class="btn btn-primary">Edit</a></div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>



@endsection
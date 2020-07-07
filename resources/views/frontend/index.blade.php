@extends('frontend.master')
@section('content')
<!--Main layout-->
<main class="mt-1">

  <!--Main container-->
  <div class="container">

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-md-8 mb-4">

        <div class="view overlay z-depth-1-half">
          <img src="{{asset('frontendtemplate/images/offer-ecommerce.jpg')}}" class="card-img-top" alt="">
          <div class="mask rgba-white-light"></div>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-4 mb-4">

        <h1>e-Shopping Mall</h1>
        <hr>
        <p align="justify">It is All in One shopping platform in Myanmar.Do you want to buy or sell? Shopping with our e-shopping mall stay at home.You can get everything what you want.
       Let's shopping at e-Shopping Mall...</p>
        <a href="https://mdbootstrap.com/" class="btn btn-indigo">Start Now!</a>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->
        <div class="row">
            <div class="col-md-4">
        <hr class="hr-dark">
      
      </div>
      <div class="col-md-3">
        <h1 class="text-center" > Our Shops</h1>
      </div>
      <div class="col-md-4">
         <hr class="hr-dark">
      
      </div>
    </div>
    <!--Grid row-->
     
    <div class="row">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="view overlay zoom">
            <img src="{{asset('frontendtemplate/images/lotteria.jpg')}}" class="img-fluid " alt="smaple image" style="width: 380px; height: 300px;">
            <div class="mask flex-center rgba-black-strong">
             <h2 class="blue-text">Lotteria</h2>
           </div>
         </div>
       </div>
     </div>

     <div class="col-lg-4 col-md-6 mb-4">
      <div class="card">
        <div class="view overlay zoom">
          <img src="{{asset('frontendtemplate/images/mk.jpg')}}" class="img-fluid " alt="smaple image" style="width: 380px; height: 300px;">
          <div class="mask flex-center rgba-black-strong">
           <h2 class="blue-text">MK Fashion</h2>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
      <div class="view overlay zoom">
        <img src="{{asset('frontendtemplate/images/berlin.jpg')}}" class="img-fluid " alt="smaple image" style="width: 380px; height: 300px;">
        <div class="mask flex-center rgba-black-strong">
         <h2 class="blue-text">Adidas</h2>
       </div>
     </div>
   </div>
 </div>
 </div>
</div><!-- //carousal-item -->
<div class="carousel-item">
  <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
      <div class="view overlay zoom">
        <img src="{{asset('frontendtemplate/images/pizza.png')}}" class="img-fluid " alt="smaple image" style="width: 380px; height: 300px;">
        <div class="mask flex-center rgba-black-strong">
         <h2 class="blue-text">Pizza Company</h2>
       </div>
     </div>
   </div>
 </div>
    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
      <div class="view overlay zoom">
        <img src="{{asset('frontendtemplate/images/Ponds.jpg')}}" class="img-fluid " alt="smaple image" style="width: 380px; height: 300px;">
        <div class="mask flex-center rgba-black-strong">
         <h2 class="blue-text">Ponds</h2>
       </div>
     </div>
   </div>
 </div>
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
      <div class="view overlay zoom">
        <img src="{{asset('frontendtemplate/images/remax.jpg')}}" class="img-fluid " alt="smaple image" style="width: 380px; height: 300px;">
        <div class="mask flex-center rgba-black-strong">
         <h2 class="blue-text">Remax</h2>
       </div>
     </div>
   </div>
 </div>
 </div>
</div><!-- item -->
</div> <!-- inner -->
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> <!-- carousal end -->


</div>
<!--Grid row-->
 
</div>
<!--Main container-->
</main>
<!--Main layout-->
<section>
  <div class="container-fluid">
     
    <div class="row">
            <div class="col-md-4">
        <hr class="hr-dark">
      
      </div>
      <div class="col-md-4">
        <h1 class="text-center"> Featured Products</h1>
      </div>
      <div class="col-md-4">
         <hr class="hr-dark">
      
      </div>
    </div>
    
 
     

    <div class="row">
       @foreach ($products as $row)
      <div class="col-lg-3 py-3"> 
       

        <div class="card">

          <!-- Card image -->
          <img class="card-img-top" src="{{asset($row->photo)}}" alt="Card image cap" style="width: 290px; height: 220px;">

          <!-- Card content -->
          <div class="card-body">

            <!-- Title -->
            <h4 class="card-title"><a>{{$row->name}}</a></h4>
            <p class="card-text">{{$row->price}}Ks</p>
            <!-- Text -->

            <!-- Button -->
            <div class="text-center">
            <a href="#" class="btn btn-indigo">Add to Cart</a>
            </div>

          </div>
        </div>

      </div>
      @endforeach


    </div>
  </div>
  </section>
  @endsection
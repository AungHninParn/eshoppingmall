@extends('frontend.master')
@section('content')

<div class="container">
<div class="card border-info mb-3" >
  <div class="card-header text-center"><h1>About Us</h1></div>
  <div class="card-body">
    <h5 class="card-title">What We Do</h5>
    <p class="card-text">We develop the web pages with Php.This website aims at an active, happy and prosperouns family and everyone who is interested in Myanmar traditinal foods and snacks.</p>
				<p class="card-text">We will introduce traditional Burmese food, which consists largely of oil-based curries, salads with fresh or boiled vegetables, various types of salted fish recipes and soups, all of which are eaten with rice. Herbs are frequently used; ginger, turmeric, garlic, chili, lemon grass, spring onions and coriander being the most popular.</p>

	<h5 class="card-title">Who We are</h5>
	<div class="row">
	<div class="col-lg-6 col-md-6">    

    <!--Card-->
    <div class="card card-cascade">

      <!--Card image-->
      <div class="view view-cascade">
        <img src="{{asset('frontendtemplate/images/m.webp')}}" class="card-img-top" alt="" style="width: 500px; height:400px; ">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
      <!--/.Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center">
        <!--Title-->
        <h4 class="card-title"><strong>Mg Pyae Phyo Zaw</strong></h4>
        <h5>Frontend developer</h5>

        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ex,
          recusandae. Facere modi
          sunt, quod quibusdam.
        </p>

        <!--Facebook-->
        <a type="button" class="btn-floating btn-small btn-fb"><i class="fab fa-facebook-f"></i></a>
        <!--Twitter-->
        <a type="button" class="btn-floating btn-small btn-tw"><i class="fab fa-github"></i></a>
        <!--Google +-->
        <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fab fa-linkedin"></i></a>

      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->

  </div>
  	<div class="col-lg-6 col-md-6">    

    <!--Card-->
    <div class="card card-cascade">

      <!--Card image-->
      <div class="view view-cascade">
        <img src="{{asset('frontendtemplate/images/w.png')}}" class="card-img-top" alt="" style="width: 500px; height:400px; ">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
      <!--/.Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center">
        <!--Title-->
        <h4 class="card-title"><strong>Ma Aung Hnin Parn</strong></h4>
        <h5>Backend developer</h5>

        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ex,
          recusandae. Facere modi
          sunt, quod quibusdam.
        </p>

        <!--Facebook-->
        <a type="button" class="btn-floating btn-small btn-fb"><i class="fab fa-facebook-f"></i></a>
        <!--Twitter-->
        <a type="button" class="btn-floating btn-small btn-tw"><i class="fab fa-github"></i></a>
        <!--Google +-->
        <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fab fa-linkedin"></i></a>

      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->

  </div>
  </div>
  </div>
</div>
</div>


@endsection
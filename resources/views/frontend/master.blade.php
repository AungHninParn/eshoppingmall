	<!DOCTYPE html>
  <html>
  <head>
    <title>e-Shopping Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      
 <!--  <link rel="stylesheet" type="text/css" href="font.css"> -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontendtemplate/styles.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontendtemplate/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontendtemplate/css/mdb.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontendtemplate/fontawesome/css/all.min.css')}}">

  </head>

  <body>
   <!--Main Navigation-->
  <header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
  
      <div class="topbar">


        <span class="topbar-child1">
          Welcome to Our Mall.Happy Shopping
        </span>
          <div class="topbar-child2">

          @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">
                          {{Auth::user()->name}}
                        </a>
                    @else
                    <span class="topbar-email">
                        <a href="{{ route('login') }}">Login |</a>
                    </span>
                        @if (Route::has('register'))
                    <span class="topbar-email">
                            <a href="{{ route('register') }}">Register</a>
                    </span>
                        @endif
                    @endauth
                </div>
            @endif

          <div class="header-wrapicon2">
            <a href="{{route('cart')}}" class="cart_show">
              <img src="{{asset('frontendtemplate/images/cart.jpg')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
              <span class="header-icons-noti cartnoti"></span>  
            </a>
          </div>
</div>
      </div>

      <div class="wrap_header navbar-expand-lg">
        <!-- Logo -->
        
        <a href="{{route('index')}}" class="logo">
          <img src="{{asset('frontendtemplate/images/logo.png')}}" alt="IMG-LOGO">e-Shop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav main_menu ml-auto" >
              <li>
                <a href="index.html">Categories</a>
                <ul class="sub_menu">
                  <li><a href="index.html">Food & Drink</a></li>
                  <li><a href="home-02.html">Clothing</a></li>
                  <li><a href="home-03.html">Electronic</a></li>
                  <li><a href="home-03.html">Beauty</a></li>
                </ul>
              </li>

              <li>
                <a href="{{route('product')}}">Products</a>
              </li>


              <li>
                <a href="{{route('about')}}">About</a>
              </li>

              <li>
                <a href="{{route('contact')}}">Contact</a>
              </li>
            
              <li>
                <form class="form-inline active-cyan-4">
                  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                  aria-label="Search">
                  <i class="fas fa-search" aria-hidden="true"></i>
                </form></li>
              </ul>
        </div>

      </div>
      </div>

    </header>


@yield('content')


  <!-- Footer -->
  <footer class="page-footer font-small grey pt-4 mt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Footer Content</h5>
          <p>Here you can use rows and columns here to organize your footer content.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Link 1</a>
            </li>
            <li>
              <a href="#!">Link 2</a>
            </li>
            <li>
              <a href="#!">Link 3</a>
            </li>
            <li>
              <a href="#!">Link 4</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> Super Power</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->



  
  <script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontendtemplate/js/jquery.min.js')}}"></script>
  
  <script type="text/javascript" src="{{asset('frontendtemplate/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontendtemplate/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontendtemplate/js/mdb.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('custom.js')}}"></script>


</body>
</html>
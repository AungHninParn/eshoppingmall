	<!DOCTYPE html>
  <html>
  <head>
    <title>e-Shopping Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      
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
                    <div class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();localStorage.clear();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
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

          @role('seller')
          <div class="header-wrapicon2">
       
    <div class="dropdown" id="markasread" onclick="markNotificationAsRead()">
      <a id="notifications" class="dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <img src="{{asset('frontendtemplate/images/noti.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <span>{{count(Auth::user()->unreadnotifications)}}</span> 
      </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications">

            @forelse(auth()->user()->unreadNotifications as $notification)
           
              <a href="{{route('orderlist',Auth::id())}}" class="dropdown-item">"{{$notification->data['user_name']}}" orderd your product.</a>
              @empty
              
              <a href="{{route('orderlist',Auth::id())}}">No unread notification</a>

            @endforelse



          </div>
    </div>

     </div>
          @else
          <div class="header-wrapicon2">
            <a href="{{route('cart')}}" class="cart_show">
              <img src="{{asset('frontendtemplate/images/supermarket.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
              <span class="header-icons-noti cartnoti"></span>  
            </a>
          </div>

          @endrole
          
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
              @role('seller')
              <li>
                <a href="{{route('shop',Auth::id())}}">Home</a>
              </li>
              @else
              <li>
              <a href="{{route('index')}}">Categories</a>
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
              @endrole         
               
              <li>
                <a href="{{route('about')}}">About</a>
              </li>

              <li>
                <a href="{{route('contact')}}">Contact</a>
              </li>

              @role('seller')
              @else
              <li>
                <form class="form-inline active-cyan-4">
                  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                  aria-label="Search">
                  <i class="fas fa-search" aria-hidden="true"></i>
                </form>
              </li>

              @endrole  
            
              
              </ul>
        </div>
        <!-- edit menu -->

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
               <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase" >Our Partner</h5>

          <ul class="list-unstyled ">
            <li>
              <a href="#!" >PayPal</a>
            </li>
            <li>
              <a href="#!">Visa</a>
            </li>
            <li>
              <a href="#!">MPU</a>
            </li>
            <li>
              <a href="#!">JBC</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">
               <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Contact Us</h5>

          <ul class="list-unstyled">
            <li>
              Head Office: Yangon
            </li>
            <li>
              Phone: 09575822
            </li>
            <li>
              Location:Pyay Road,Kamayut, Yangon
            </li>
            <li>
              
            </li>
          </ul>

        </div>

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Our Services</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Delivery Services</a>
            </li>
            <li>
              <a href="#!">Notification Alert</a>
            </li>
            <li>
              <a href="#!">24/7 Call Center</a>
            </li>
            <li>
              <a href="#!">Terms and Condition</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Information</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Payment Methods</a>
            </li>
            <li>
              <a href="#!">Time and Costs</a>
            </li>
            <li>
              <a href="#!">Shipping Methods</a>
            </li>
            <li>
              <a href="#!">FAQs</a>
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



  <script src="{{ asset('js/app.js') }}" defer></script>
  <script type="text/javascript" src="{{asset('frontendtemplate/js/jquery.min.js')}}"></script>
  
<!--   <script type="text/javascript" src="{{asset('frontendtemplate/js/bootstrap.min.js')}}"></script> -->
<!--   <script type="text/javascript" src="{{asset('frontendtemplate/js/bootstrap.bundle.min.js')}}"></script> -->
  <script type="text/javascript" src="{{asset('frontendtemplate/js/mdb.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('custom.js')}}"></script>


</body>
</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
       <!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            margin: 0;
        }
        .navbar{
          background:#E3B448;
        }
        .mainContentContainer{
          background:#CBD18F;
        }
    </style>
</head>
<body>

    {{-- @if(session('user_id')  = null ) --}}
    {{-- {{ session('user_id')  }} --}}

 <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark  mt0 p-2" >
    <!-- Brand -->
    <a class="navbar-brand" href="#">ShopiFy</a>

    <!-- Navbar Toggler Button (for small screens) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Left-aligned Tabs -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('HomePage')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
        </ul>
    </div>

    <!-- Right-aligned Cart Icon -->
    <div class="navbar-nav">
        <ul class="navbar-nav">

        <li>
           <div class="container mt-3">
            <div class="dropdown">
             <button class="btn  btn-outline-dark dropdown-toggle " style="hover" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                   My Profile
               </button>
               <ul class="dropdown-menu dropdown-menu-end p-1">
                   <li><a class="nav-link text-dark"><i class="fas fa-user"></i> Hi ,{{ ucfirst(session('user_name')) }} </a> </li>

                   <li> <a class="nav-link text-dark" href="{{ route('cart.openCart') }}">
                      <i class="fas fa-shopping-cart"></i> Cart
                      </a></li>

                   <li> <a class="nav-link text-dark" href="{{ route('cphLogin') }}">
                      <i class="fas fa-user-shield"></i>CPH
                      </a></li>

                   <li>  <a class="btn btn-danger" href="{{ route('logout.userLogout') }}">
                    <i class="fas fa-sign-out"></i>Logout</a></li>


               </ul>
           </div>
        </div>

        </li>
        </ul>
    </div>
</nav>


        {{--!!  custom page layout !!--}}
        
         <main class="p-1 mainContentContainer" >
            @yield('dashbaord_controls')
        </main>

      {{--!!  custom script  !!--}}
      @stack('custom-page-scripts')

</div>




<!-- End of .container -->
  <footer
          class="text-center text-lg-start text-dark"
          style="background-color: #ECEFF1;"

          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4 text-white"
             style="background-color: #3A6B35"
             >
      <!-- Left -->
      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start m-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Company name</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              Here you can use rows and columns to organize your footer
              content. Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Products</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark">MDBootstrap</a>
            </p>
            <p>
              <a href="#!" class="text-dark">MDWordPress</a>
            </p>
            <p>
              <a href="#!" class="text-dark">BrandFlow</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Bootstrap Angular</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-dark">Your Account</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Become an Affiliate</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Shipping Rates</a>
            </p>
            <p>
              <a href="#!" class="text-dark">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/"
         >MDBootstrap.com</a
        >
    </div>
    <!-- Copyright -->
  </footer>

</body>
</html>

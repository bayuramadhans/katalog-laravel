<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('shopmax/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('shopmax/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('shopmax/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('shopmax/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('shopmax/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('shopmax/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('shopmax/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('shopmax/css/style.css')}}">
    @yield('style')

  </head>
  <body>

  <div class="site-wrap">


    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{route('public.index')}}" class="js-logo-clone">Brand</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li id="beranda"><a href="{{route('public.index')}}">Beranda</a></li>
                <li id="produk" class="has-children">
                  <a href="#">Produk</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                  </ul>
                </li>
                <li id="produk"><a href="#">Kontak</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="{{route('public.keranjang')}}" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">{{count(Session::get('cart',array()))}}</span>
            </a>
              <a class="dropdown show icons-btn d-inline-block has-children" href="#" role="button" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon-user"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="user">
                <a class="dropdown-item" href="{{route('login')}}">Masuk</a>
              </div>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
    @yield('content')
    <footer class="site-footer custom-border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="logo">
              <div class="site-logo">
                <a href="{{route('public.index')}}" class="js-logo-clone">Brand</a>
              </div>
            </div>
          </div>
          <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
            <!-- <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Menu</h3>
              </div>
              <div class="col-md-12 col-lg-12">
                <ul class="list-unstyled">
                  <li><a href="#">Beranda</a></li>
                  <li><a href="#">Produk</a></li>
                  <li><a href="#">Kontak</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div> -->
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Informasi Kontak</h3>
              <ul class="list-unstyled">
                <li class="address">Kampus C Universitas Airlangga</li>
                <li class="phone">+62 812345678</li>
                <li class="email">admin@ebis.com</li>
              </ul>
            </div>

            <div class="block-7">

            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('shopmax/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('shopmax/js/jquery-ui.js')}}"></script>
  <script src="{{asset('shopmax/js/popper.min.js')}}"></script>
  <script src="{{asset('shopmax/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('shopmax/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('shopmax/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('shopmax/js/aos.js')}}"></script>

  <script src="{{asset('shopmax/js/main.js')}}"></script>
  @yield('script')

  </body>
</html>

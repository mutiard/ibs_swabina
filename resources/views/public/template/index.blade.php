<!DOCTYPE html>
<html lang="en">
  <head>
      @include('public/template/head')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    @include('public/template/header') 
    @yield('content')
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    @include('public/template/footer')
    @include('public/template/script')
    @yield('script')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
      @include('public/template/head')
      @yield('css')
  </head>

  <body>
    @include('public/template/header_content')
    @include('public/template/script')
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
    @yield('script')
  </body>
</html>

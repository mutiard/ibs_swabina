<!DOCTYPE html>
<html>
<head>

    @include('public/template/head_recruitment')
    @yield('extra_styles')

</head>

<body class="fixed-sidebar">
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

  @include('public.template.script_recruitment')
  @yield('extra_scripts')
  
</body>
</html>

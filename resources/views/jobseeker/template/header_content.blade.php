<!-- Header Section Start -->
<header id="home" class="hero-area">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
    <div class="container">
      <div class="theme-header clearfix">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="lni-menu"></span>
            <span class="lni-menu"></span>
            <span class="lni-menu"></span>
          </button>
        <a href="{{route('JobseekerDashboard')}}" class="navbar-brand"><img src="{{asset('jobx/assets/img/logo.png') }}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{url('jobseeker/datadiri')}}">
                  Data Diri
                </a>
              </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profil Saya
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="about.html">About</a></li>
                <li><a class="dropdown-item" href="job-page.html">Job Page</a></li>
                <li><a class="dropdown-item" href="job-details.html">Job Details</a></li>
              </ul>
            </li> -->

            <li>
              <a class="nav-link" href="">
                Welcome {{ Auth::user()->name }} !
              </a>

            </li>
            <li class="button-group">
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="button btn btn-common">Sign out</a>
              <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-menu" data-logo="{{asset('jobx/assets/img/logo-mobile.png') }}"></div>
  </nav>
  <!-- Navbar End -->

  <!-- Page Header Start -->
<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-header">
        @yield('header-title')
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End -->

</header>
<!-- Header Section End -->

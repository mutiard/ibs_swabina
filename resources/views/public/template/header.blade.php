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
        <a href="#" class="navbar-brand"><img src="{{asset('jobx/assets/img/logo.png') }}" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item active">
              <a class="nav-link" href="#">
                Home
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('apply')}}">
                Apply
              </a>
            </li>
            <li class="button-group">
              <a href="{{url('login')}}" class="button btn btn-lg btn-common">Sign in</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="mobile-menu" data-logo="{{asset('jobx/assets/img/logo-mobile.png') }}"></div>
  </nav>
  <!-- Navbar End -->
  @if ((url()->current()) == (url('/')))

  @elseif ((url()->current()) == (url('/login')))
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header">
            <h3>Login</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  @elseif ((url()->current()) == (url('/register')))
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header">
            <h3>Register</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header">
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

</header>
<!-- Header Section End -->

<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <h1><a class="navbar-brand" href="index.html">SMI

                </a></h1>
            <button class="navbar-toggler ml-lg-auto ml-sm-5 bg-light" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="ml-lg-5 navbar-nav mr-lg-auto">
                  <li class="nav-item  mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                      <a href="{{url('/')}}">Beranda</a>
                  </li>
                  <li class="nav-item active mr-lg-4 mt-lg-0 mt-sm-4 mt-3">
                      <a href="{{url('jobseeker/dashboard')}}">Cari Lowongan</a>
                  </li>
                  <li class="nav-item dropdown mr-lg-4 my-lg-0 my-sm-4 my-3">
                      <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          Profil Saya
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a href="{{url('jobseeker/profil')}}">Lihat Profil</a>
                          <a href="">Ubah Profil</a>
                          <a href="">Lamaran Saya</a>
                      </div>
                  </li>


              </ul>

                <button type="button" class="btn w3ls-btn text-uppercase font-weight-bold d-block">
                    Welcome {{ Auth::user()->name }} !!
                </button>

                <div>
                  <a class="btn w3ls-btn btn-2 ml-lg-1 text-uppercase font-weight-bold d-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                <!-- <a href="{{ route('logout') }}" type="button" class="btn w3ls-btn btn-2 ml-lg-1 text-uppercase font-weight-bold d-block">
                    Logout
                </a> -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>

            </div>
        </nav>
    </div>
</header>

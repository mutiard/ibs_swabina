@extends('public.template.index')

@section('content')

    <!-- Content section Start -->
    <section id="content" class="section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-6 col-xs-12">
            <div class="page-login-form box">
              <h3>
                Login
              </h3>
              <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Keep Me Signed In</label>
                </div>
                <button class="btn btn-common log-btn">Submit</button>
              </form>
              <ul class="form-links">
                <li class="text-center"><a href="{{ route('register') }}">Belum punya akun?</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

@endsection

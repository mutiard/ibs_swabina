<!-- login modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-theme1">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="post" class="p-3">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control bg-theme" value="Login">
                    </div>
                    <div class="row sub-w3l my-3">
                        <div class="col sub-w3ltd">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1" class="text-dark">
                                <span></span>Remember me?</label>
                        </div>
                        <div class="col forgot-w3l text-right">
                            <a href="#" class="text-dark">Forgot Password?</a>
                        </div>
                    </div>
                    <p class="text-center dont-do">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark">
                            <strong> Now</strong></a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //login modal -->
<!-- register modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-theme1">
                <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" class="p-3">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" id="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password1" class="col-form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="new-password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password2" class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm"  required autocomplete="new-password">
                    </div>
                    <div class="sub-w3l">
                        <div class="sub-w3ltd">
                            <input type="checkbox" id="brand2" value="">
                            <label for="brand2" class="mb-3 text-dark">
                                <span></span>I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control bg-theme" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

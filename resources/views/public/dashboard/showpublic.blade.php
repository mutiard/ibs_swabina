@extends('jobseeker.template.index')

@section('content')

<!-- Job Detail Section Start -->
<section class="job-detail section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-8 col-md-12 col-xs-12">
        <div class="content-area">
          <h4>Deskripsi Pekerjaan</h4>
          {!!$lowongan->deskripsi_pekerjaan!!}
          <h5>Persyaratan</h5>
          {!!$lowongan->persyaratan!!}
          <br><br>
          <a href="{{url('login')}}" class="btn btn-common">Lamar Pekerjaan</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-xs-12">
        <div class="sideber">
          <div class="widghet">
            <h3>Lokasi Pekerjaan</h3>
            <h6>Surabaya</h6>
          </div>
          <div class="widghet">
            <h3>Share Pekerjaan Ini</h3>
            <div class="share-job">
              <form method="post" class="subscribe-form">
                <div class="form-group">
                  <input type="email" name="Email" class="form-control" placeholder="{{url()->current()}}" required="">
                  <button type="submit" name="subscribe" class="btn btn-common sub-btn"><i class="lni-files"></i></button>
                  <div class="clearfix"></div>
                  <br>
                </div>
              </form>
               <!--These buttons are created by frinmash.blogspot.com,frinton madtha-->
               <div id="share-buttons">
                 <!-- Facebook -->
                 <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank"><img src="https://4.bp.blogspot.com/-raFYZvIFUV0/UwNI2ek6i3I/AAAAAAAAGSA/zs-kwq0q58E/s1600/facebook.png" alt="Facebook" /></a>
                 <!-- Twitter -->
                 <a href="https://twitter.com/share?url={{url()->current()}} Share Buttons" target="_blank"><img src="https://4.bp.blogspot.com/--ISQEurz3aE/UwNI4hDaQMI/AAAAAAAAGS4/ZAgmPiM9Xpk/s1600/twitter.png" alt="Twitter" /></a>
                 <!-- LinkedIn -->
                 <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank"><img src="https://2.bp.blogspot.com/-3_cATk7Wlho/UwNI3eoTTLI/AAAAAAAAGSQ/Y8cpq6S-SeQ/s1600/linkedin.png" alt="LinkedIn" /></a>
                 <!-- Email -->
                 <a href="mailto:?Subject=LowonganPekerjaan&Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{url()->current()}}"><img src="https://4.bp.blogspot.com/-njgKtNLrPqI/UwNI2o-9WfI/AAAAAAAAGR4/f8da1gBgyLs/s1600/email.png" alt="Email" /></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Job Detail Section End -->


@endsection

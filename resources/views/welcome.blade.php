@extends('public.template.index')

@section('content')


<!-- download Section start -->
<section id="download" class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 col-xs-12">
        <div class="download-wrapper">
          <div>
            <div class="download-text">
              <h3><strong>PT. Swabina Gatra</strong></h3>
              <br>
              <p class="text-dark" style="text-indent:100px; font-size:17px;text-align: justify;"><strong>PT. Swabina Gatra </strong> merupakan perusahaan human resources management system atau human resources solution.</p>
            </div>
            <div class="app-button">
            <!-- <a href="#" class="btn btn-border"><i class="lni-apple"></i>Download <br> <span>From App Store</span></a>
            <a href="#" class="btn btn-common btn-effect"><i class="lni-android"></i> Download <br> <span>From Play Store</span></a> -->
          </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-4 col-xs-12">
        <div class="download-thumb">
          <img class="img-fluid" src="{{asset('/img/smi-illustration.svg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- download Section end -->

<!-- corruusel Start -->
<section class="public section-carousel section bg-cyan owl-carousel" >

</section>
<!-- Mitra Section End -->

 <!-- Latest Section Start -->
 <section id="latest-jobs" class="section bg-gray">

</section>
<!-- Latest Section End -->
@endsection
@section('script')
<script>
  $(".section-carousel").owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplaySpeed:2000,
    autoplayHoverPause:true,
    dots:true,
    URLhashListener:false,
    responsive:{
        0:{
          items:1
        },
      991:{
            items:1
          }
      }

  });
</script>
@endsection

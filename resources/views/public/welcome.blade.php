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
              <h3><strong>PT. Selaras Mitra Integra</strong></h3>
              <br>
              <p class="text-dark" style="text-indent:100px; font-size:17px;text-align: justify;"><strong>PT. Selaras Mitra Integra </strong> atau biasa disebut <strong>SMI</strong> merupakan perusahaan human resources management system atau human resources solution. SMI adalah konsultan yang fokus pada pengembangan human capital dan organisasi. SMI menggunakan pendekatan yang humanis dan metode-metode yang reliabel untuk membantu setiap human capital dan organisasi untuk berkembang. SMI mengkombinasikan teori dan praktik human resource sebagai pendekatan yang diterapkan. Spesialiasi SMI di area rekrutmen, assessment center, training & development, coaching & counseling, labour supply dan layanan terkait lainnya. SMI percaya bahwa manusia merupakan aset yang paling penting bagi organisasi. Paradigma ini memberi SMI perspektif yang unik dalam mencari solusi yang holistik akan masalah human capital dan organisasi.</p>
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
  <!-- KategoriSection Start -->
  <div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-header">
              <h3 class="section-title lowongan-title-section">Kategori Pekerjaan</h3>
              <p>Kategori Dengan Ketersedian Terbanyak</p>
            </div>
          </div>
        </div>
      </div>
    <div class="container">
      <div class="row d-flex justify-content-center">
       @foreach ($Kategori as $item)
        <div class="col-lg-4 col-md-4 col-xs-4 f-category f-category-color-blue">
            <a href="">
              <div class="icon bg-color-1">
                <i class="lni-home"></i>
              </div>
              <h4 class="text-dark lowongan-title">{{$item->deskripsi}}</h4>
              <p>({{$item->length}} Lowongan)</p>
            </a>
          </div>
      @endforeach
      </div>
      <a href="{{route('PublicLowongan')}}">
        <button class="btn btn-common d-flex justify-content-center mx-auto mt-5 mb-3 rounded btn-temukan"><i class="title-temukan-btn text-white">Lebih Banyak Kategori Lainnya <i class="fa fa-angle-double-right fa-1x">&nbsp;</i></i></button>
      </a>
    </div>
  </div>
<!-- KategoriSection end -->
<!-- SpesialSection Start -->
  <div>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-header">
                <h3 class="section-title lowongan-title-section">Spesialiasi Pekerjaan</h3>
                <p>Spesialisasi Dengan Ketersedian Terbanyak</p>
              </div>
            </div>
          </div>
          </div>
      <div class="container">
        <div class="row d-flex justify-content-center">
          @foreach ($Spesialisasi as $item)
          <div class="col-lg-4 col-md-4 col-xs-4 f-category f-category-color-blue">
            <a href="">
                <div class="icon bg-color-1">
                  <i class="lni-home"></i>
                </div>
                <h4 class="text-dark lowongan-title" >{{$item->spesial}}</h4>
                <p>({{$item->length}} Lowongan)</p>
              </a>
            </div>
          @endforeach
        </div>
        <a href="{{route('PublicLowongan')}}">
            <button class="btn btn-common d-flex justify-content-center mx-auto mt-5 mb-3 rounded btn-temukan"><i class="title-temukan-btn text-white">Lebih Banyak Spesialiasi Lainnya <i class="fa fa-angle-double-right fa-1x">&nbsp;</i></i></button>
          </a>
      </div>
    </div>
<!-- SpesialSection end -->
</section>
<!-- Mitra Section End -->

 <!-- Latest Section Start -->
 <section id="latest-jobs" class="section bg-gray">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Lowongan Terakhir</h2>
      <p>Lowongan Terakhir Yang Tersedia</p>
    </div>

    <div class="row">
      @foreach ($lowongan as $item)
        <div class="col-lg-6 col-md-12 col-xs-12">
         <a href="">
          <div class="jobs-latest">
            <div class="img-thumb">
              <img src="assets/img/features/img-1.jpg" alt="">
            </div>
            <div class="content">

              <h3>{{$item->job_tittle}}</h3>
              <p class="brand">MagNews</p>
              <div class="tags">
                <span><i class="lni-map-marker"></i> Surabaya</span>
                <span><i class="lni-user"></i></span>
              </div>
              <div class="tag mb-3"><i class="lni-tag"></i> #</div>

            </div>
          </div>
        </a>
        </div>
      @endforeach
    </div>

    <div class="col-12 text-center mt-4">
        <a href="{{route('PublicLowongan')}}">
            <button class="btn btn-common d-flex justify-content-center mx-auto mt-5 mb-3 rounded btn-temukan"><i class="title-temukan-btn text-white">Lebih Banyak Lowongan lagi <i class="fa fa-angle-double-right fa-1x">&nbsp;</i></i></button>
        </a>
    </div>
  </div>
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

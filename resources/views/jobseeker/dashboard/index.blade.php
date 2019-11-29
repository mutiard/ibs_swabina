@extends('jobseeker.template.index_content')

@section('content')

<!-- Job Browse Section Start -->
<section class="job-browse section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="wrap-search-filter row">
          <div class="col-lg-5 col-md-5 col-xs-12">
            <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
          </div>
          <div class="col-lg-5 col-md-5 col-xs-12">
            <input type="text" class="form-control" placeholder="Location: City, State, Zip">
          </div>
          <div class="col-lg-2 col-md-2 col-xs-12">
            <button type="submit" class="btn btn-common float-right">Filter</button>
          </div>
        </div>
      </div>
      @foreach($lowongan_pekerjaan as $lowongan)
      <div class="col-lg-6 col-md-12 col-xs-12">
        <a class="job-listings-featured" href="/jobseeker/dashboard/show/{{$lowongan->id}}">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
              <div class="job-company-logo">
                <!-- <img src="{{asset('jobx/assets/img/features/img1.png') }}" alt=""> -->
              </div>
              <div class="job-details">
                <h3><b>{{$lowongan->job_tittle}}</b><br></h3>
                <span class="company-neme">{{$lowongan->nama_client}}</span>
                <div class="tags">
                  <span><i class="lni-map-marker"></i> Surabaya</span>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 text-right">
              <div class="tag-type">
                <sapn class="heart-icon">
                  <i class="lni-heart"></i>
                </sapn>
                <span class="full-time">Full Time</span>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach

      <div class="col-lg-12 col-md-12 col-xs-12">
        <!-- Start Pagination -->
        <ul class="pagination">
          {{ $lowongan_pekerjaan->links() }}
        </ul>
        <!-- End Pagination -->
      </div>
    </div>
  </div>
</section>
<!-- Job Browse Section End -->

@endsection

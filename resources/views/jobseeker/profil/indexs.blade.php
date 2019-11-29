@extends('jobseeker.template.index')

@section('job')

<section class="employ-sec">
    <div class="container">
        <div class="row pt-lg-5">
            <div class="col-lg-4">

                <div class="left_widget">
                    <h3 class="left-widget-job">
                        Profil Saya</h3>
                    <ul>

                        <li class="@if(url('/jobseeker/dashboard') == request()->url()
                           ) active @else '' @endif  treeview">
                            <a href="{{ url('jobseeker/dashboard')}}"><i class="fa fa-line-chart"></i> <span class="nav-label">Dashboard</span></a>
                        </li>
                        <li class="@if(url('/jobseeker/profil/tentangsaya') == request()->url() or url('jobseeker/profil/riwayatpekerjaan') == request()->url()) active @else '' @endif treeview">
                            <a href="{{ url('jobseeker/profil/tentangsaya')}}"><i class="fa fa-address-book"></i> <span class="nav-label">Profil Saya</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                              <li class="@if(url('jobseeker/profil/riwayatpekerjaan') == request()->url()) active @else '' @endif  treeview"><a href="{{ url('jobseeker/profil/riwayatpekerjaan')}}">Riwayat Pekerjaan</a></li>
                              <li class="@if(url('jobseeker/profil/riwayatpendidikan') == request()->url()) active @else '' @endif  treeview"><a href="{{ url('jobseeker/profil/riwayatpendidikan')}}">Riwayat Pendidikan</a></li>
                              <li class="@if(url('jobseeker/profil/sertifikatkeahlian') == request()->url()) active @else '' @endif  treeview"><a href="{{ url('jobseeker/profil/sertifikatkeahlian')}}">Sertifikat Keahlian</a></li>
                              <li class="@if(url('jobseeker/profil/kemampuanbahasa') == request()->url()) active @else '' @endif  treeview"><a href="{{ url('jobseeker/profil/kemampuanbahasa')}}">Kemampuan Bahasa</a></li>
                              <li class="@if(url('jobseeker/profil/curiculumvitae') == request()->url()) active @else '' @endif  treeview"><a href="{{ url('jobseeker/profil/curiculumvitae')}}">Curiculum Vitae</a></li>
                              <li class="@if(url('jobseeker/profil/tentangsaya') == request()->url()) active @else '' @endif  treeview"><a href="{{ url('jobseeker/profil/tentangsaya')}}">Tentang Saya</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row">
                  @foreach($profil as $prof)
                    <div class="col-sm-6 e-left">
                        <a href="#"><img src="{{ asset('web/images/b2.jpg') }}" alt="" class="img-fluid"></a>
                        <div class="e-desc">
                            <h6><a href="{{url('/jobsingle')}}">{{$prof->nama_lengkap}} - </a></h6>

                            <ul class="e-tags">
                                <li>
                                    javascript</li>

                                <li>computer vision</li>
                                <li>angular js</li>
                                <li>c++</li>
                            </ul>
                            <hr>
                            <ul class="desc-list">
                                <li>
                                    <span>Lokasi:</span>

                                </li>
                                <li>
                                    <span>Salary:</span>
                                    Negotiable
                                </li>
                                <li>
                                    <span>Experience</span>
                                    Expert
                                </li>
                                <li>
                                    <span>Posted: </span>
                                    32 minutes ago
                                </li>
                            </ul>
                            <a href="#exampleModal" class="btn wthree-bnr-btn text-capitalize" data-toggle="modal"
                                aria-pressed="false" data-target="#exampleModal" role="button">Lamar Pekerjaan</a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <ul class="pagination pt-4">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#" class="text-white bg-theme">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li> <a href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</section>

@endsection

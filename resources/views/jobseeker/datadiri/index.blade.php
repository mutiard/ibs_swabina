@extends('jobseeker.template.index_content')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('header-title')
<h3>Data Diri</h3>
@endsection
@section('content')
<!--Alert -->
<div class="row mt-5">

    <div class="alert alert-primary col-md-11 col-lg-11 ml-auto mr-auto" role="alert">
        <i class="fa fa-info-circle fa-2x">&nbsp;</i>
        <strong>Lengkapi Data Diri untuk melamar pekerjaan (wajib untuk identitas,pendidikan,dan minat kerja)</strong>
    </div>
    
    @if(Session::has('alert'))
    <div class="alert alert-warning col-md-11 col-lg-11 ml-auto mr-auto" role="alert">
        <i class="fa fa-exclamation-triangle fa-2x">&nbsp;</i>
        <strong>{{Session::get('alert')}}</strong>
    </div>
    @endif

    <div  class="status_data_identitas alert alert-danger col-md-11 col-lg-11 ml-auto mr-auto {{($dataUserSt['Status']['identitas'])?"hidden-block":""}} " role="alert">
        <i class="fa fa-exclamation-circle fa-2x">&nbsp;</i>
        <strong>Data Identitas Belum Lengkap</strong>
        <span class="menu-badge badge badge-pill badge-danger" id="btn-identitas" href="#">
          <i class="fa fa-edit fa-1x">&nbsp;</i>Selsaikan 
         </span>
      </div>

      <div class="status_data_pendidikan alert alert-danger col-md-11 col-lg-11 ml-auto mr-auto {{($dataUserSt['Status']['pendidikan'])?"hidden-block":""}}" role="alert">
          <i class="fa fa-exclamation-circle fa-2x">&nbsp;</i>
          <strong>Data Pendidikan Belum Lengkap !</strong>
          <span class="menu-badge badge badge-pill badge-danger" id="btn-pendidikan" href="#">
            <i class="fa fa-edit fa-1x">&nbsp;</i>Selsaikan 
            </span>
      </div>

      <div class="status_data_minat alert alert-danger col-md-11 col-lg-11 ml-auto mr-auto {{($dataUserSt['Status']['minatkerja'])?"hidden-block":""}}" role="alert">
          <i class="fa fa-exclamation-circle fa-2x">&nbsp;</i>
          <strong>Data Minat Belum Lengkap !</strong>
          <span class="menu-badge badge badge-pill badge-danger" id="btn-minat" href="#">
            <i class="fa fa-edit fa-1x">&nbsp;</i>Selsaikan 
          </span>
      </div>

    
 </div>

<!-- Job Browse Section Start -->
<div class="section">
  <div class="mr-auto">
    <div class="row">
      <div class="ml-5 mr-2 col-lg-2 col-md-4 col-xs-12">
        <div class="right-sideabr">
          <h4>Data Diri</h4>
          <ul id="tab" class="list-item">
              <li class="active">
                <a class="list-group-item-action" href="#identitas">Identitas</a>
                <br>
                <span class="status_data_identitas menu-badge badge badge-pill badge-danger mt-0 {{ $dataUserSt['Status']['identitas']?"hidden-block":"" }}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="tab-active list-group-item-action" href="#pendidikan">Pendidikan&nbsp;&nbsp;</a>
                <br>
                <span class="status_data_pendidikan menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['pendidikan'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="list-group-item-action" href="#keluarga">Keluarga</a>
                <br>
              <span id="status_data_keluarga" class="menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['keluarga'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="list-group-item-action" href="#pekerjaan">Pekerjaan</a>
                <br>
              <span class="status_data_pekerjaan menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['pengalamankerja'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="list-group-item-action" href="#minat">Minat</a>
                <br>
              <span class="status_data_minat menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['minatkerja'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="list-group-item-action" href="#aktivitas">Aktivitas</a>
                <br>
              <span id="status_data_aktivitas" class="menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['aktivitas'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="list-group-item-action" href="#lainnya">Lainnya</a>
                <br>
              <span id="status_data_lainnya" class="menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['riwayatpenyakit'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
              <li>
                <a  class="list-group-item-action" href="#lampiran">Lampiran</a>
                <br>
              <span id="status_data_lampiran" class="menu-badge badge badge-pill badge-danger mt-0 {{($dataUserSt['Status']['lampiran'])?"hidden-block":""}}">Belum Lengkap</span>
              </li>
            </ul>
        </div>
      </div>
          <script src="{{asset('js/smi_onevents.js')}}"></script>
          <div class="col-lg-9 col-md-7 col-xs-12 tabs-stage">
            <!--Detail Identitas-->
            @include('jobseeker.datadiri.identitas')
            <!--Identitas end-->
            <!--Detail Pendidikan-->
            @include('jobseeker.datadiri.pendidikan')
            <!--Pendidikan end-->
            <!--Detail Keluarga -->
            @include('jobseeker.datadiri.keluarga')
            <!--Keluarga end-->
            <!--Detail Pekerjaan -->
            @include('jobseeker.datadiri.pekerjaan')
            <!--Pekerjaan end-->
            <!--Detail  Minat-->
            @include('jobseeker.datadiri.minat')
            <!--Minat end-->
            <!--Detail aktivitas-->
            @include('jobseeker.datadiri.aktivitas')
            <!--aktivitas end-->
            <!--Detail Lain-lain-->
            @include('jobseeker.datadiri.lainnya')
            <!--Lain-lain end-->
            <!--Detail Lampiran-->
            @include('jobseeker.datadiri.lampiran')
            <!--Lampiran end-->
        </div>

        <!-- Modal delete end -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                  <h5 class="delete-title align-middle">
                    <i class="text-danger fa fa-exclamation-circle fa-2x">&nbsp;</i>Yakin Untuk Hapus ?
                  </h5>
              </div>
              <div class="modal-body justify-content-center" style="display:none">
                  <h6 id="delete-caution" class="text-danger delete-caution align-middle">
                      <i class="text-danger fa fa-info-circle">&nbsp;</i>Penghapusan gagal !!
                  </h6>
              </div>
              <div class="d-flex modal-footer justify-content-around">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button id="delete_supreme" href="" type="button" class="btn btn-danger ">Hapus
                    <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal delete end -->

         <!-- Modal delete lampiran start -->
         <div class="modal fade" id="deletemodal_lampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="delete-title align-middle">
                      <i class="text-danger fa fa-exclamation-circle fa-2x">&nbsp;</i>Yakin Untuk Menghapus File?
                    </h5>
                </div>
                <div class="modal-body justify-content-center" style="display:none">
                    <h6 id="delete-caution-lampiran" class="text-danger delete-caution align-middle">
                        <i class="text-danger fa fa-info-circle">&nbsp;</i>Penghapusan gagal !!
                    </h6>
                </div>
                <div class="d-flex modal-footer justify-content-around">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button  id="delete_lampiran" href="" type="button" class="btn btn-danger ">Hapus
                      <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                  </button>
                </div>
              </div>
            </div>
          </div>
        <!-- Modal delete lampiran end-->

    </div>
  </div>
</div>


<!-- Job Browse Section End -->
@endsection
@section('script')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$('#btn-identitas').on('click',function(event){
    event.preventDefault();
  	$('#tab li [href=#identitas]').trigger('click');
  });
  $('#btn-pendidikan').on('click',function(event){
    event.preventDefault();
  	$('#tab li [href=#pendidikan]').trigger('click');
  });
  $('#btn-minat').on('click',function(event){
    event.preventDefault();
  	$('#tab li [href=#minat]').trigger('click');
  });

    $('#tab li').on('click', function (event) {
      $('#tab li').css('background-color','');
      $(this).css('background-color','#f2f7fb');
      event.preventDefault();    
      $('.tab-active').removeClass('tab-active');
      $(this).parent().addClass('tab-active');
      $('.tabs-stage .tab-content').hide();
      $($(this).find("a").attr('href') ).fadeIn(300);
    });
    
    $('#tab li a:first').trigger('click');
</script>  
<script src="{{asset('js/smi_lib.js') }}"></script>   
@endsection
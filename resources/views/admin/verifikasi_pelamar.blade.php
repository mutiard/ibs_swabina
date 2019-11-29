@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Verifikasi Data Lamaran </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Kepegawaian</a>
      </li>
      <li>
        <a>Data Pelamar</a>
      </li>
      <li class="active">
        <strong> Verifikasi Data Lamaran  </strong>
      </li>

    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" >
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5> Verifikasi Data Lamaran 
           <!-- {{Session::get('comp_year')}} -->
         </h5>

       </div>
       <div class="ibox-content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box" id="seragam_box">
              <div class="col-sm-6">
                <div class="form-group row">
                  <label for="nik" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$jobseeker->nama_lengkap}}" readonly="">
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-sm-10 col-xs-10" style="padding-bottom: 10px;">
                <div class="form-group">

                  <div class="col-lg-2">

                  </div>
                </div>
              </div>
              <div class="box-body">
                <form id="form-pekerja" data-parsley-validate="" method="POST" action="{{url('verifikasi_pelamar/store')}}/{{$jobseeker->users_id}}" enctype="multipart/form-data">
                  @csrf
                  <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                    <thead>
                     <tr>
                      <th style="text-align : center;"> NO </th>
                      <th style="text-align : center;"> BERKAS </th>
                      <th style="text-align : center;"> SESUAI </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td><center>IJAZAH TERAKHIR 1 Lbr</center></td>
                      <td><center><input type="checkbox" name="status_ijazah" value="1"{{$jobseeker->status_ijazah == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td><center>KTP 4 Lbr</center></td>
                      <td><center><input type="checkbox" name="status_ktp" value="1"{{$jobseeker->status_ktp == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                    <tr>
                      <td class="text-center">3</td>
                      <td><center>KSK 1 Lbr</center></td>
                      <td><center><input type="checkbox" name="status_ksk" value="1"{{$jobseeker->status_ksk == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td><center>AKTE LAHIR 1 Lbr</center></td>
                      <td><center><input type="checkbox" name="status_akte_lahir" value="1"{{$jobseeker->status_akte_lahir == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                    <tr>
                      <td class="text-center">5</td>
                      <td><center>SKCK 1 Lbr</center></td>
                      <td><center><input type="checkbox" name="status_skck" value="1"{{$jobseeker->status_skck == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                    <tr>
                      <td class="text-center">6</td>
                      <td><center>NO REKENING MANDIRI</center></td>
                      <td><center><input type="checkbox" name="status_rekening" value="1"{{$jobseeker->status_rekening == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                    <tr>
                      <td class="text-center">7</td>
                      <td><center>FOTO 4x6 1 Lbr</center></td>
                      <td><center><input type="checkbox" value="1" name="status_foto" value="1"{{$jobseeker->status_foto == 1 ? 'checked' : ''}}></center></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-12 text-center">
                  <a href="{{url('admin/data_pelamar')}}">
                    <button type="button" class="btn btn-white">Kembali</button>
                  </a>
                  <button type="submit" class="btn btn-primary text-center" {{ $jobseeker->status_diterima != '1' ? 'disabled' : '' }}>
                    Simpan
                  </button>
                </div>
              </form>
            </div>

            <div class="box-footer">
              <h5></h5>
            </div><!-- /.box-footer --> 
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
</div>
</div>
</div>



<div class="row" style="padding-bottom: 50px;"></div>


@endsection



@section('extra_scripts')
<script type="text/javascript">
  $(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();
  });


</script>
@endsection


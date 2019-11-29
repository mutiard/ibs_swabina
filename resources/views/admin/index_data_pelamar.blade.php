@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Data Pelamar </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Kepegawaian</a>
      </li>
      <li class="active">
        <strong> Data Pelamar  </strong>
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
          <h5> Data Pelamar 
           <!-- {{Session::get('comp_year')}} -->
         </h5>

       </div>
       <div class="ibox-content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box" id="seragam_box">
              <div class="col-sm-6">
                <form method="POST" class="form-horizontal" action="{{ route('pegawai.import') }}" enctype="multipart/form-data">
                  @csrf
                  <fieldset>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih File Excel</span>
                      <span class="fileinput-exists">Change</span><input type="file" name="file"/></span>
                      <span class="fileinput-filename"></span>
                      <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                    </div> 
                  </fieldset>
                  <button class="btn btn-primary" type="submit">Import</button>
                </form>
              </div>
              <div class="col-md-10 col-sm-10 col-xs-10" style="padding-bottom: 10px;">
                <div class="form-group">

                  <div class="col-lg-2">

                  </div>
                </div>
              </div>
              <div class="box-body">
               <!--  <button class="btn btn-info btn-md btn-flat pull-right" type="button">Generate Payroll</button> -->
               <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                <thead>
                 <tr>
                  <th style="text-align : center;"> No </th>
                  <th style="text-align : center;"> NIK </th>
                  <th style="text-align : center;"> Nama </th>
                  <th style="text-align : center;"> Alamat </th>
                  <th style="text-align : center;"> Keterangan </th>
                  <th style="text-align : center;"> Detail </th>
                  <th style="text-align : center;"> Verifikasi </th>
                  <!-- <th style="text-align : center;"> Aksi </th> -->
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($jobseeker as $u)

                <tr>
                  <td class="text-center">{{$i}}</td>
                  <td><center>{{$u->NIK}}</center></td>
                  <td><center>{{$u->nama_lengkap}}</center></td>
                  <td><center>{{$u->alamat_ktp}}</center></td>
                  <td>
                    <center>
                      @if($u->status_diterima == '1')
                      <span class="label label-warning">Belum Diverifikasi</span>
                      @elseif($u->status_diterima == '2')
                      <span class="label label-info">Seleksi Wawancara</span>
                      @elseif($u->status_diterima == '3')
                      <span class="label label-info">Seleksi Bidang</span>
                      @elseif($u->status_diterima == '4')
                      <span class="label label-info">Tes Psikologi</span>
                      @elseif($u->status_diterima == '5')
                      <span class="label label-info">Tes Kesehatan</span>
                      @elseif($u->status_diterima == '6')
                      <span class="label label-info">Tes Penjelasan</span>
                      @elseif($u->status_diterima == '7')
                      <span class="label label-success">Diterima</span>
                      @else
                      <span class="label label-danger">Tidak Diterima</span>
                      @endif
                    </center>
                  </td>
                  <td><center><a href="{{url('detail_pelamar')}}/{{$u->users_id}}"><button class="btn btn-primary btn-circle" type="button"><i class="fa fa-list"></i></button></a></center></td>
                  <td><center><a href="{{url('verifikasi_pelamar')}}/{{$u->users_id}}"><button type="button" class="btn btn-white btn-circle"><i class="fa fa-pencil"></i></button></a></center></td>
                  <!-- <td>
                    <center>
                      <a href="#"><button type="button" class="btn btn-warning" {{ $u->status_diterima != '2' ? 'disabled' : '' }}>Undangan Wawancara</button></a>
                      <a href="#"><button type="button" class="btn btn-danger" {{ $u->status_diterima != '4' ? 'disabled' : '' }}>Undangan Tes Psikologi</button></a>
                    </center>
                  </td> -->
                  @php
                  $i++;
                  @endphp
                  @endforeach
                </tr>
              </tbody>
            </table>
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

    $('#addColumn1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "responsive": true,
      "autoWidth": false,
      "pageLength": 10,
      "retrieve" : true,
    });

  });


</script>
@endsection


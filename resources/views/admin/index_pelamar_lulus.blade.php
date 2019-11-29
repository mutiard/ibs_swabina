@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Daftar Pelamar Lulus Seleksi</h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Kepegawaian</a>
      </li>
      <li class="active">
        <strong>Daftar Pelamar Lulus Seleksi</strong>
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
          <h5>Daftar Pelamar Lulus Seleksi</h5>

        </div>
        <div class="ibox-content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box" id="seragam_box">
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
                    <th style="text-align : center;"> No. Telp </th>
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
                    <td><center>{{$u->nohp}}</center></td>
                  </td>
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
      pageLength: 25,
      responsive: true,
      dom: '<"html5buttons"B>lTfgitp',
      buttons: [
      { extend: 'copy'},
      {extend: 'csv'},
      {extend: 'excel', title: 'Daftar Pelamar Lulus Seleksi'},
      {extend: 'pdf', title: 'Daftar Pelamar Lulus Seleksi'},

      {extend: 'print',
      customize: function (win){
        $(win.document.body).addClass('white-bg');
        $(win.document.body).css('font-size', '10px');

        $(win.document.body).find('table')
        .addClass('compact')
        .css('font-size', 'inherit');
      }
    }
    ]
  });

  });


</script>
@endsection


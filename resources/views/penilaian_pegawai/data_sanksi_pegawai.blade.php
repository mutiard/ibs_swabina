@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Data Sanksi Pegawai </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Hubnaker</a>
      </li>
      <li class="active">
        <strong>Data Sanksi Pegawai</strong>
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
          <h5>Data Sanksi Pegawai
           <!-- {{Session::get('comp_year')}} -->
         </h5>

       </div>
       <div class="ibox-content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box" id="seragam_box">
              <div class="col-sm-12 col-6 text-right">
                <a href="{{url('tambah_sanksi_pegawai')}}"><button class="btn btn-primary" type="button">Tambah Sanksi</button></a>
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
                  <th style="text-align : center;"> Nama Pegawai </th>
                  <th style="text-align : center;"> Jenis Sanksi </th>
                  <th style="text-align : center;"> Alasan </th>
                  <th style="text-align : center;"> Tanggal Mulai </th>
                  <th style="text-align : center;"> Tanggal Selesai </th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($sp as $u)

                <tr>
                  <td class="text-center">{{$i}}</td>
                  <td><center>{{$u->nama}}</center></td>
                  <td><center>{{$u->jenis_sp}}</center></td>
                  <td><center>{{$u->alasan_sp}}</center></td>
                  <td><center>{{$u->tanggal_mulai}}</center></td>
                  <td><center>{{$u->tanggal_selesai}}</center></td>
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


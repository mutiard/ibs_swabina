@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Setup Periode Penilaian </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Hubnaker</a>
      </li>
      <li class="active">
        <strong>Setup Periode Penilaian</strong>
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
          <h5>Setup Periode Penilaian
           <!-- {{Session::get('comp_year')}} -->
         </h5>

       </div>
       <div class="ibox-content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box" id="seragam_box">
              <div class="col-sm-12 col-6 text-right">
                <a data-toggle="modal" data-target="#input-periode" class="btn btn-primary btn-flat" type="button">Tambah Periode</a>
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
                  <th style="text-align : center;"> Periode Bulan </th>
                  <th style="text-align : center;"> Tahun </th>
                  <th style="text-align : center;"> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($periode as $u)

                <tr>
                  <td class="text-center">{{$i}}</td>
                  <td><center>{{$u->s_bulan}}-{{$u->e_bulan}}</center></td>
                  <td><center>{{$u->tahun}}</center></td>
                  <td><center>
                    @if($u->status_aktif == 1)
                    <a type="button" class="btn btn-sm btn-success disabled">
                      Aktif
                    </a>
                    <a href="{{url('periode_penilaian/nonaktif')}}/{{$u->id_periode_nilai}}"><button class="btn btn-default" type="button">Tidak Aktif</button></a>
                    @else
                    <a href="{{url('periode_penilaian/aktif')}}/{{$u->id_periode_nilai}}"><button class="btn btn-default" type="button">Aktif</button></a>
                    <a type="button" class="btn btn-sm btn-danger disabled">
                      Tidak Aktif
                    </a>
                    @endif
                  </center>
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
@include('penilaian_pegawai.setup_periode_penilaian_pegawai_extend_input_periode')
</div>



<div class="row" style="padding-bottom: 50px;"></div>


@endsection



@section('extra_scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#input-periode').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
          });    

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


@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Daftar Permintaan Tenaga Kerja </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Permintaan Tenaga Kerja</a>
      </li>
      <li class="active">
        <strong>Permintaan Tenaga Kerja</strong>
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
          <h5> Permintaan Tenaga Kerja
           <!-- {{Session::get('comp_year')}} -->
         </h5>

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
                  <th style="text-align : center;"> Nomor Surat </th>
                  <th style="text-align : center;"> Aksi </th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach($permintaan as $u)

                <tr>
                  <td class="text-center">{{$i}}</td>
                  <td><center>{{$u->id_permintaan}}/Person/1221/{{Carbon\Carbon::parse($u->tanggal_permintaan)->startOfMonth()->format('m')}}.{{Carbon\Carbon::parse($u->tanggal_permintaan)->startOfYear()->format('Y')}}</center></td>
                  <td><center>
                    <a href="{{url('permintaan_tenaga_kerja')}}/{{$u->id_permintaan}}"><button class="btn btn-primary btn-circle" type="button"><i class="fa fa-list"></i></button></a>
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


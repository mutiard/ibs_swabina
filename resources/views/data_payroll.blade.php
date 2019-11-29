@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> Data Payroll </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                          <a>Data Karyawan</a>
                        </li>
                        <li class="active">
                            <strong> Data Karyawan </strong>
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
                    <h5> Data Payroll
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
                <!-- <button class="btn btn-info btn-md btn-flat pull-right" type="button">Generate Payroll</button> -->
                  <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                      <thead>
                           <tr>
                              <th style="text-align : center;"> No </th>
                              <th style="text-align : center;"> NIK </th>
                              <th style="text-align : center;"> Nama </th>
                              <th style="text-align : center;"> Tanggal Gaji </th>
                              <th style="text-align : center;"> Periode Kerja </th>
                              <th style="text-align : center;"> Total Gaji </th>
                              <th style="text-align : center;"> Aksi </th>
                          </tr>
                          </thead>
                      <tbody>
                              @php
                                $i=1;
                              @endphp
                              @foreach($data_payroll as $u)

                              <tr>
                                  <td class="text-center">{{$i}}</td>
                                  <td><center>{{$u->nik}}</td>
                                  <td><center>{{$u->nama_karyawan}}</center></td>
                                  <td><center>{{$u->tgl_gaji}}</center></td>
                                  <td><center>{{$u->sd_prd_kerja}} - {{$u->ed_prd_kerja}}</center></td>
                                  <td><center>{{$u->total_gaji}}</center></td>
                                  <td>
                                    <center>
                                      <a href="{{url('print_data_payroll')}}/{{$u->id_hdr}}" target="_blank" class="btn btn-info">print</a>
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


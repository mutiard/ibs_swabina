@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> Setup Periode Gaji </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                          <a>Setup</a>
                        </li>
                        <li class="active">
                            <strong> Setup Periode Gaji </strong>
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
                   <div class="text-right">
                      <button class="btn btn-info btn-md btn-flat" type="button" data-toggle="modal" data-target="#insert">Tambah Periode Gaji</button>
                   </div>
                </div>
                <div class="ibox-content">
                        <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="col-md-10 col-sm-10 col-xs-10" style="padding-bottom: 10px;">
                  <div class="form-group">

                    <div class="col-lg-2">
                      
                    </div>
                  </div>
                </div>
                <div class="box-body">
                
                  <table id="addColumn1" class="table table-bordered table-striped tabel_opname1">
                      <thead>
                           <tr>
                              <th style="text-align : center;"> No </th>
                              <th style="text-align : center;"> Tanggal Gaji </th>
                              <th style="text-align : center;"> Tanggal Awal Prd Kerja </th>
                              <th style="text-align : center;"> Tanggal Akhir Prd Kerja </th>
                              <th style="text-align : center;"> Selisih Bulan Kerja </th>
                              <th style="text-align : center;"> Aksi </th>
                          </tr>
                          </thead>
                      <tbody>
                              @php
                                $i=1;
                              @endphp
                              @foreach($setup_periode_gaji as $u)

                              <tr>
                                  <td class="text-center">{{$i}}</td>
                                  <td><center>{{$u->tgl_gaji}}</td>
                                  <td><center>{{$u->sd_prd_kerja}}</center></td>
                                  <td><center>{{$u->ed_prd_kerja}}</center></td>
                                  <td><center>{{$u->selisih_bln_kerja}}</center></td>
                                  <td>
                                    <center>
                                    
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

{{-- Insert --}}
<div class="modal inmodal fade" id="insert" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert </h4>
                </div>
                <form method="POST" action="{{ url('/setup_periode_gaji/simpan') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="" />
                        <div class="form-group"><label class="col-sm-4 control-label">tgl gaji</label>
                            <div class="col-sm-8"><input type="text" class="form-control date" name="tgl_gaji" id="tgl_gaji" required></div>
                        </div>
                        <div class="form-group"><label class="col-sm-4 control-label">Start Date</label>
                            <div class="col-sm-8"><input type="text" class="form-control date" name="sd_prd_kerja" id="sd_prd_kerja" required></div>
                        </div>
                        <div class="form-group"><label class="col-sm-4 control-label">End Date</label>
                            <div class="col-sm-8"><input type="text" class="form-control date" name="ed_prd_kerja" id="ed_prd_kerja" required></div>
                        </div>
                        <div class="form-group"><label class="col-sm-4 control-label">Selisih Bulan Kerja</label>
                            <div class="col-sm-8"><input type="number" class="form-control" name="selisih_bln_kerja" id="selisih_bln_kerja" required></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert Data</button>
                </div>
                </form>
        </div>
    </div>
</div>


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

$('.date').datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
      });

      
</script>
@endsection


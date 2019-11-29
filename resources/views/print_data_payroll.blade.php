@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> Print Gaji Pegawai </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                          <a>Payroll</a>
                        </li>
                        <li class="active">
                            <strong> Print Gaji Pegawai </strong>
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
                <!-- <div class="ibox-title">
                  <div class="text-right">
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Komponen Gaji</button>
                  </div>
                </div> -->
                <div class="ibox-content p-xl">
                      <div class="row">


                          <div class="col-sm-12 text-right">
                              <h4>Kode Gaji : {{$tbl_gaji_hdr[0]->kode_gaji}}</h4>
                              <h4>NIK : {{$tbl_gaji_hdr[0]->nik}}</h4>
                              <h4>Nama : {{$tbl_gaji_hdr[0]->nama_karyawan}}</h4>
                              <h4>Tanggal Gaji : {{$tbl_gaji_hdr[0]->tgl_gaji}}</h4>
                              <h4>Periode Kerja : {{$tbl_gaji_hdr[0]->sd_prd_kerja}} - {{$tbl_gaji_hdr[0]->ed_prd_kerja}}</h4>
                          </div>
                      </div>

                      <div class="table-responsive m-t">
                          <table class="table invoice-table">
                              <thead>
                              <tr>
                                  <th>Detail Gaji</th>
                                  <th>Pendapatan</th>
                                  <th>Potongan</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($tbl_gaji_dtl as $data)
                              <tr>
                                  <td>{{$data->des_komponen_gaji}}</td>
                                  <td>{{$data->nominal_komponen_gaji}}</td>
                                  <td>0</td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /table-responsive -->

                      <table class="table invoice-total">
                          <tbody>
                          <tr>
                              <td><strong>Total :</strong></td>
                              <td>{{$tbl_gaji_hdr[0]->total_gaji}}</td>
                          </tr>
                  <!--         <tr>
                              <td><strong>TAX :</strong></td>
                              <td>$235.98</td>
                          </tr>
                          <tr>
                              <td><strong>TOTAL :</strong></td>
                              <td>$1261.98</td>
                          </tr> -->
                          </tbody>
                      </table>
                     <!--  <div class="text-right">
                          <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
                      </div>

                      <div class="well m-t"><strong>Comments</strong>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                      </div> -->
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

  $('.date').datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
      });

});
      
</script>
@endsection


@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Proses Seleksi Rekrutmen </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Kepegawaian</a>
      </li>
      <li class="active">
        <strong> Proses Seleksi Rekrutmen  </strong>
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
          <h5> Proses Seleksi Rekrutmen 
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
                  <th style="text-align : center;"> NIK </th>
                  <th style="text-align : center;"> Nama </th>
                  <th style="text-align : center;"> Alamat </th>
                  <th style="text-align : center;"> Wawancara </th>
                  <th style="text-align : center;"> Bidang </th>
                  <th style="text-align : center;"> Psikologi </th>
                  <th style="text-align : center;"> Kesehatan </th>
                  <th style="text-align : center;"> Penjelasan </th>
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
                      <a href="{{url('terima_pelamar_wawancara')}}/{{$u->users_id}}"><button type="button" class="btn btn-info btn-circle" {{ $u->status_diterima != '2' ? 'disabled' : '' }}><i class="fa fa-check"></i></button></a>
                      <a href="{{url('tolak_pelamar')}}/{{$u->users_id}}"><button type="button" class="btn btn-warning btn-circle" {{ $u->status_diterima != '2' ? 'disabled' : '' }}><i class="fa fa-times"></i></button></a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a href="{{url('terima_pelamar_bidang')}}/{{$u->users_id}}"><button type="button" class="btn btn-info btn-circle" {{ $u->status_diterima != '3' ? 'disabled' : '' }}><i class="fa fa-check"></i></button></a>
                      <a href="{{url('tolak_pelamar')}}/{{$u->users_id}}"><button type="button" class="btn btn-warning btn-circle" {{ $u->status_diterima != '3' ? 'disabled' : '' }}><i class="fa fa-times"></i></button></a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a href="{{url('terima_pelamar_psikologi')}}/{{$u->users_id}}"><button type="button" class="btn btn-info btn-circle" {{ $u->status_diterima != '4' ? 'disabled' : '' }}><i class="fa fa-check"></i></button></a>
                      <a href="{{url('tolak_pelamar')}}/{{$u->users_id}}"><button type="button" class="btn btn-warning btn-circle" {{ $u->status_diterima != '4' ? 'disabled' : '' }}><i class="fa fa-times"></i></button></a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a href="{{url('terima_pelamar_kesehatan')}}/{{$u->users_id}}"><button type="button" class="btn btn-info btn-circle" {{ $u->status_diterima != '5' ? 'disabled' : '' }}><i class="fa fa-check"></i></button></a>
                      <a href="{{url('tolak_pelamar')}}/{{$u->users_id}}"><button type="button" class="btn btn-warning btn-circle" {{ $u->status_diterima != '5' ? 'disabled' : '' }}><i class="fa fa-times"></i></button></a>
                    </center>
                  </td>
                  <td>
                    <center>
                      <a data-toggle="modal" data-target="#input-nilai" data-id="{{$u->users_id}}"><button type="button" class="btn btn-info btn-circle" {{ $u->status_diterima != '6' ? 'disabled' : '' }}><i class="fa fa-check"></i></button></a>
                      <a href="{{url('tolak_pelamar')}}/{{$u->users_id}}"><button type="button" class="btn btn-warning btn-circle" {{ $u->status_diterima != '6' ? 'disabled' : '' }}><i class="fa fa-times"></i></button></a>
                    </center>
                  </td>
                  @php
                  $i++;
                  @endphp
                  @include('admin.index_data_pegawai_extend_input_lokasi')
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

    $('#input-nilai').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var id = button.data('id');
            console.log(id);

            var modal = $(this);
            modal.find('.modal-body #id').val(id);
          });

  });


</script>
@endsection


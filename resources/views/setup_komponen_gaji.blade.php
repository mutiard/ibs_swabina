@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> Setup Komponen gaji </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                          <a>Setup</a>
                        </li>
                        <li class="active">
                            <strong> Setup Komponen Gaji </strong>
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
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Komponen Gaji</button>
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
                              <th style="text-align : center;"> Kode Gaji </th>
                              <th style="text-align : center;"> Deskripsi </th>
                              <th style="text-align : center;"> Aksi </th>
                          </tr>
                          </thead>
                      <tbody>
                              @php
                                $i=1;
                              @endphp
                              @foreach($setup_komponen_gaji as $u)

                              <tr>
                                  <td class="text-center">{{$u->num}}</td>
                                  <td><center>{{$u->kode_komponen_gaji}}</td>
                                  <td><center>{{$u->desc_komponen_gaji}}</center></td>
                                  <td>
                                  <center>
                                    <button class="btn btn-default btn-circle"
                                            data-num="{{$u->num}}"
                                            data-kode="{{$u->kode_komponen_gaji}}"
                                            data-desc="{{$u->desc_komponen_gaji}}"
                                          data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i>
                                    </button>
                                    <button class="btn btn-default btn-circle"
{{--                                          data-id="{{$u->id}}"--}}
{{--                                          data-name="{{$u->name}}"--}}
{{--                                          data-deskripsi="{{$u->deskripsi}}"--}}
                                            data-num="{{$u->num}}"
                                            data-kode="{{$u->kode_komponen_gaji}}"
                                            data-desc="{{$u->desc_komponen_gaji}}"
                                          data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i>
                                    </button>
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
{{-- Delete --}}
<div class="modal inmodal fade" id="delete" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <form method="POST" action="{{ url('/setup_komponen_gaji/delete') }}" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                @csrf
                @method('DELETE')
                <h4 class="text-center">Apakah Anda yakin untuk menghapus data?</h4>
                    <input type="hidden" name="id" id="id" value="" />
             </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Tidak</button>
                  <button type="submit" class="btn btn-primary">Ya</button>
              </div>
              </form>
      </div>
  </div>
</div>
{{-- Update --}}
<div class="modal inmodal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit Komponen Gaji</h4>
                </div>
                <form method="POST" action="{{ url('/setup_komponen_gaji/edit') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="" />
                        <div class="form-group"><label class="col-sm-4 control-label">Kode Gaji</label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="name" id="name"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-4 control-label">Deskripsi</label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="deskripsi" id="deskripsi"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
                </form>
        </div>
    </div>
</div>
{{-- Insert --}}
<div class="modal inmodal fade" id="insert" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert </h4>
                </div>
                <form method="POST" action="{{ url('/setup_komponen_gaji/simpan') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <input type="hidden" name="hid" id="hid" value="" />
                        <div class="form-group"><label class="col-sm-4 control-label">Kode Komponen Gaji</label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="name" id="name"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-4 control-label">Deskripsi</label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="deskripsi" id="deskripsi"></div>
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

  $('.date').datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
      });

});

$('#edit').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal

                        var num = button.data('num')
                        var kode = button.data('kode')
                        var desc = button.data('desc')

                        var modal = $(this)
                        modal.find('.modal-body #num').val(num);
                        modal.find('.modal-body #kode').val(kode);
                        modal.find('.modal-body #desc').val(desc);
                    })
$('#delete').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal

                        var num = button.data('num')
                        var kode = button.data('kode')
                        var desc = button.data('desc')

                        var modal = $(this)
                        modal.find('.modal-body #num').val(num);
                        modal.find('.modal-body #kode').val(kode);
                        modal.find('.modal-body #desc').val(desc);
                    })

</script>
@endsection


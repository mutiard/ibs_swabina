@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Setup Site </h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li>
              <a>Setup</a>
            </li>
            <li class="active">
                <strong> Setup Pola </strong>
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
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Pola Jadwal</button>
                  </div>
                </div>
                <div class="ibox-content">
                    @if(session('success'))
                        @component('public.notifikasi.app_alert_success')
                            @slot('alert_message')
                                {{ session('success') }}
                            @endslot
                        @endcomponent

                    @elseif(session('failed'))
                        @component('public.notifikasi.app_alert_failed')
                            @slot('alert_message')
                                {{ session('failed') }}
                            @endslot
                        @endcomponent
                    @endif
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
                              <th style="text-align : center;width: 5%">No</th>
                              <th>Pola</th>
                              <th>Hari</th>
                              <th>Class</th>
                              <th style="text-align : center;width: 10%">Aksi</th>
                          </tr>
                          </thead>
                      <tbody>
                              @php
                                $i=1;
                              @endphp
                              @foreach($pola as $u)

                              <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$u->desk}}</td>
                                  <td>{{$u->hari_ke}}</td>
                                  <td>{{$u->schclass_id}}</td>
                                  <td style="text-align : center;">
                                    <button class="btn btn-default btn-circle"
                                            data-id="{{$u->polaid}}"
                                            data-desk="{{$u->desk}}"
                                            data-hari="{{$u->hari_ke}}"
                                            data-kelas="{{$u->schclass_id}}"
                                          data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i>
                                    </button>
                                    <button class="btn btn-default btn-circle"
                                            data-id="{{$u->polaid}}"
                                            data-desk="{{$u->desk}}"
                                            data-hari="{{$u->hari_ke}}"
                                            data-kelas="{{$u->schclass_id}}"
                                          data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i>
                                    </button>
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
              <form method="POST" action="{{ url('/setup_pola/delete') }}" class="form-horizontal" enctype="multipart/form-data">
                  <div class="modal-body">
                    @csrf
{{--                    <h4 class="text-center">Apakah Anda yakin untuk menghapus data?</h4>--}}
                    <input type="hidden" name="id" id="id" value="" />
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Pola</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="desk" id="desk" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Hari Ke</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="hari" id="hari" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Class</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="kelas" id="kelas" readonly></div>
                      </div>
                 </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Delete</button>
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
                <h4 class="modal-title">Edit Data Pola</h4>
            </div>
            <form method="POST" action="{{ url('/setup_pola/update') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="" />
{{--                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Pola</label>--}}
{{--                        <div class="col-sm-10"><input type="text" class="form-control" name="desk" id="desk" readonly></div>--}}
{{--                    </div>--}}
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Pola</label>
                        <div class="col-sm-10">
                            <select class="form-control chosen-select-width" name="desk" id="desk" required>
                                @foreach($polahdr as $j)
                                    <option value="{{$j->deskripsi}}">{{ $j->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Hari Ke</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="hari" id="hari" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Class</label>
                        <div class="col-sm-10">
                            <select class="form-control chosen-select-width" name="kelas" id="kelas" required>
                                @foreach($class as $j)
                                    <option value="{{$j->kode}}">{{ $j->kode }} ({{ $j->stime }} - {{ $j->etime }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
                <h4 class="modal-title">Tambah Pola Jadwal</h4>
            </div>
            <form method="POST" action="{{ url('/setup_pola/tambah') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Pola</label>
                    <div class="col-sm-10">
                        <select class="form-control chosen-select-width" name="desk" id="desk" required>
                            @foreach($polahdr as $j)
                                <option value="{{$j->kode}}">{{ $j->deskripsi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @for($i=1;$i<=7;$i++)
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Hari Ke-{{$i}}</label>
                    <div class="col-sm-10">
                        <select class="form-control chosen-select-width" name="{{$i}}" id="desk" required>
                            @foreach($class as $j)
                                <option value="{{$j->kode}}">{{ $j->kode }} ({{ $j->stime }} - {{ $j->etime }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endfor
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
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
    var button = $(event.relatedTarget); // Button that triggered the modal

    var id = button.data('id');
    var desk = button.data('desk');
    var hari = button.data('hari');
    var kelas = button.data('kelas');

    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #desk').val(desk);
    modal.find('.modal-body #hari').val(hari);
    modal.find('.modal-body #kelas').val(kelas);
});

$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal

    var id = button.data('id');
    var desk = button.data('desk');
    var hari = button.data('hari');
    var kelas = button.data('kelas');

    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #desk').val(desk);
    modal.find('.modal-body #hari').val(hari);
    modal.find('.modal-body #kelas').val(kelas);
});

</script>
@endsection


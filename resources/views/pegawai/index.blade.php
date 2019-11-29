@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Data Pegawai </h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li class="active">
                <strong> Data Pegawai </strong>
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
                    <div class="text-left">
                        <h5>Daftar Data Pegawai</h5>
                    </div>
                  <div class="text-right">
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Data Pegawai</button>
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
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Deskripsi</th>
                              <th>Email</th>
                              <th>No Telp</th>
                              <th>Alamat</th>
                              <th style="text-align : center;width: 10%">Action</th>
                          </tr>
                          </thead>
                      <tbody>
                              @php
                                $i=1;
                              @endphp
                              @foreach($kar as $u)

                              <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$u->nik}}</td>
                                  <td>{{$u->nama}}</td>
                                  <td>{{$u->site}}</td>
                                  <td>{{$u->email}}</td>
                                  <td>{{$u->no_tlp}}</td>
                                  <td>{{$u->alamat}}</td>
                                  <td style="text-align : center;">
                                    <button class="btn btn-default btn-circle"
                                            data-id="{{$u->id}}"
                                            data-nik="{{$u->nik}}"
                                            data-nama="{{$u->nama}}"
                                            data-siteid="{{$u->site_id}}"
                                            data-site="{{$u->site}}"
                                            data-email="{{$u->email}}"
                                            data-tlp="{{$u->no_tlp}}"
                                            data-alamat="{{$u->alamat}}"
                                          data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i>
                                    </button>
                                    <button class="btn btn-default btn-circle"
                                            data-id="{{$u->id}}"
                                            data-nik="{{$u->nik}}"
                                            data-nama="{{$u->nama}}"
                                            data-siteid="{{$u->site_id}}"
                                            data-site="{{$u->site}}"
                                            data-email="{{$u->email}}"
                                            data-tlp="{{$u->no_tlp}}"
                                            data-alamat="{{$u->alamat}}"
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
              <form method="POST" action="{{ url('/pegawai/delete') }}" class="form-horizontal" enctype="multipart/form-data">
                  <div class="modal-body">
                    @csrf
{{--                    <h4 class="text-center">Apakah Anda yakin untuk menghapus data?</h4>--}}
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="siteid" id="siteid" value="" />
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">NIK</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="nik" id="nik" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Site</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="site" id="site" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Email</label>
                          <div class="col-sm-10"><input type="email" class="form-control" name="email" id="email" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">No Telp</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="tlp" id="tlp" readonly></div>
                      </div>
                      <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Alamat</label>
                          <div class="col-sm-10"><input type="text" class="form-control" name="alamat" id="alamat" readonly></div>
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
                <h4 class="modal-title">Edit Data Pegawai</h4>
            </div>
            <form method="POST" action="{{ url('/pegawai/update') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">NIK</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nik" id="nik"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama"></div>
                    </div>
                    <div class="form-group">
                        <label style="text-align: left" class="col-sm-2 control-label">Site</label>
                        <div class="col-sm-10">
                            <select class="form-control inputstl" id="site" name="site" required>
                                @foreach($site as $k)
                                    <option value="{{$k->nama}}">{{$k->nama}} ({{ $k->deskripsi }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Email</label>
                        <div class="col-sm-10"><input type="email" class="form-control" name="email" id="email" ></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">No Telp</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="tlp" id="tlp" ></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Alamat</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="alamat" id="alamat" ></div>
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
                <h4 class="modal-title">Tambah Data Pegawai</h4>
            </div>
            <form method="POST" action="{{ url('/pegawai/tambah') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">NIK</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nik" id="nik"></div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" required></div>
                </div>
                <div class="form-group">
                    <label style="text-align: left" class="col-sm-2 control-label">Site</label>
                    <div class="col-sm-10">
                        <select class="form-control inputstl" id="site" name="site" required>
                            @foreach($site as $k)
                                <option value="{{$k->id}}">{{$k->nama}} ({{ $k->deskripsi }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Email</label>
                    <div class="col-sm-10"><input type="email" class="form-control" name="email" id="email" ></div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">No Telp</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="tlp" id="tlp" ></div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Alamat</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="alamat" id="alamat" ></div>
                </div>
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
    var nik = button.data('nik');
    var nama = button.data('nama');
    var siteid = button.data('siteid');
    var site = button.data('site');
    var email = button.data('email');
    var tlp = button.data('tlp');
    var alamat = button.data('alamat');

    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #nik').val(nik);
    modal.find('.modal-body #nama').val(nama);
    modal.find('.modal-body #siteid').val(siteid);
    modal.find('.modal-body #site').val(site);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #tlp').val(tlp);
    modal.find('.modal-body #alamat').val(alamat);
});
$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal

    var id = button.data('id');
    var nik = button.data('nik');
    var nama = button.data('nama');
    var siteid = button.data('siteid');
    var site = button.data('site');
    var email = button.data('email');
    var tlp = button.data('tlp');
    var alamat = button.data('alamat');

    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #nik').val(nik);
    modal.find('.modal-body #nama').val(nama);
    modal.find('.modal-body #siteid').val(siteid);
    modal.find('.modal-body #site').val(site);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #tlp').val(tlp);
    modal.find('.modal-body #alamat').val(alamat);
});

</script>
@endsection


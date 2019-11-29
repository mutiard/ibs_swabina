@extends('main')

@section('title', 'Absensi')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Absensi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li>
                    <a>Absensi</a>
                </li>
                <li>
                    <a>Perizinan</a>
                </li>
                <li class="active">
                    <strong>Daftar Pengajuan</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Surat Pengajuan Izin</h5>
                    </div>
                    <div class="ibox-content">
                        @if(session('success'))
                            @component('public.notifikasi.app_alert_success')
                                @slot('alert_message')
                                    {{ session('success') }}
                                @endslot
                            @endcomponent
                        @elseif(session('warning'))
                            @component('public.notifikasi.app_alert_warning')
                                @slot('alert_message')
                                    {{ session('warning') }}
                                @endslot
                            @endcomponent
                        @elseif(session('failed'))
                            @component('public.notifikasi.app_alert_failed')
                                @slot('alert_message')
                                    {{ session('failed') }}
                                @endslot
                            @endcomponent
                        @endif
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kar</th>
                                        <th>Nama</th>
                                        <th>Site</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($absen as $l)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $l->id_karyawan }}</td>
                                        <td>{{ $l->nama }}</td>
                                        <td>{{ $l->site }}</td>
                                        <td>{{ $l->tgl_pengajuan }}</td>
                                        <td>{{ $l->tgl_mulai }}</td>
                                        <td>{{ $l->tgl_selesai }}</td>
                                        @if($l->kategori == 1)
                                            <td style="text-align: center"><button type="button" class="btn btn-danger btn-sm">Sakit</button></td>
                                        @elseif($l->kategori == 2)
                                            <td style="text-align: center"><button type="button" class="btn btn-success btn-sm">Cuti</button></td>
                                        @else
                                            <td style="text-align: center"><button type="button" class="btn btn-warning btn-sm">Dispensasi</button></td>
                                        @endif
                                        <td>{{ $l->keterangan }}</td>
                                        <td style="text-align: center">
                                            <button class="btn btn-default btn-circle"
                                                data-id="{{$l->id}}"
                                                data-karid="{{$l->id_karyawan}}"
                                                data-nama="{{$l->nama}}"
                                                data-site="{{$l->site}}"
                                                data-pengajuan="{{$l->tgl_pengajuan}}"
                                                data-mulai="{{$l->tgl_mulai}}"
                                                data-selesai="{{$l->tgl_selesai}}"
                                                data-ket="{{$l->keterangan}}"
                                                @if($l->kategori == 1)
                                                    data-kategori="Sakit"
                                                @elseif($l->kategori == 2)
                                                    data-kategori="Cuti"
                                                @else
                                                    data-kategori="Dispensasi"
                                                @endif
                                                data-toggle="modal" data-target="#acc"><i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-default btn-circle"
                                                data-id="{{$l->id}}"
                                                data-karid="{{$l->id_karyawan}}"
                                                data-nama="{{$l->nama}}"
                                                data-site="{{$l->site}}"
                                                data-pengajuan="{{$l->tgl_pengajuan}}"
                                                data-mulai="{{$l->tgl_mulai}}"
                                                data-selesai="{{$l->tgl_selesai}}"
                                                data-ket="{{$l->keterangan}}"
                                                @if($l->kategori == 1)
                                                data-kategori="Sakit"
                                                @elseif($l->kategori == 2)
                                                data-kategori="Cuti"
                                                @else
                                                data-kategori="Dispensasi"
                                                @endif
                                                data-toggle="modal" data-target="#tolak"><i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Acc data --}}
    <div class="modal inmodal fade" id="acc" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Approval Surat Pengajuan Izin</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('absensi/acc')}}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" id="id"/>
                        <input type="hidden" name="karid" id="karid"/>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Pengajuan</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="pengajuan" id="pengajuan" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Mulai</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="mulai" id="mulai" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Selesai</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="mulai" id="mulai" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Kategori</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="kategori" id="kategori" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Keterangan</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ket" id="ket" readonly></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- tolak spl --}}
    <div class="modal inmodal fade" id="tolak" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Tolak Surat Pengajuan Izin</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('absensi/tolak')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id"/>
                        <input type="hidden" name="karid" id="karid"/>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Pengajuan</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="pengajuan" id="pengajuan" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Mulai</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="mulai" id="mulai" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Selesai</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="mulai" id="mulai" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Kategori</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="kategori" id="kategori" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Keterangan</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ket" id="ket" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Alasan Penolakan</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="keterangan" id="keterangan" required></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra_scripts')
<!-- FooTable -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
<script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"></script>--}}
{{--<script src="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css"></script>--}}
{{--<script src="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"></script>--}}
<!-- Page-Level Scripts -->

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            scrollX:true
        } );
        new $.fn.dataTable.FixedHeader( table );
    });

    $('#acc').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal

        var id = button.data('id');
        var karid = button.data('karid');
        var nama = button.data('nama');
        var site = button.data('site');
        var pengajuan = button.data('pengajuan');
        var mulai = button.data('mulai');
        var selesai = button.data('selesai');
        var kategori = button.data('kategori');
        var ket = button.data('ket');

        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #karid').val(karid);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #site').val(site);
        modal.find('.modal-body #pengajuan').val(pengajuan);
        modal.find('.modal-body #mulai').val(mulai);
        modal.find('.modal-body #selesai').val(selesai);
        modal.find('.modal-body #kategori').val(kategori);
        modal.find('.modal-body #ket').val(ket);
    });

    $('#tolak').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal

        var id = button.data('id');
        var karid = button.data('karid');
        var nama = button.data('nama');
        var site = button.data('site');
        var pengajuan = button.data('pengajuan');
        var mulai = button.data('mulai');
        var selesai = button.data('selesai');
        var kategori = button.data('kategori');
        var ket = button.data('ket');

        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #karid').val(karid);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #site').val(site);
        modal.find('.modal-body #pengajuan').val(pengajuan);
        modal.find('.modal-body #mulai').val(mulai);
        modal.find('.modal-body #selesai').val(selesai);
        modal.find('.modal-body #kategori').val(kategori);
        modal.find('.modal-body #ket').val(ket);
    });
</script>
@endsection

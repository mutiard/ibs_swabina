@extends('main')

@section('title', 'Slip')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Approval SPPD</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/dashboard')}}">Home</a>
            </li>
            <li>
                <a>Atasan</a>
            </li>
            <li class="active">
                <strong>Approval SPPD</strong>
            </li>
        </ol>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Approval SPPD</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Site</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Kendaraan</th>
                                    <th>Keperluan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($ppkd as $l)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $l->karyawan_id }}</td>
                                    <td>{{ $l->nama }}</td>
                                    <td>{{ $l->site }}</td>
                                    <td>{{ $l->waktu_awal }}</td>
                                    <td>{{ $l->waktu_akhir }}</td>
                                    <td>{{ $l->jenis_kendaraan }} {{ $l->merk }} ({{ $l->plat }})</td>
                                    <td>{{ $l->keterangan }}</td>
                                    <td style="text-align: center">
                                        <button class="btn btn-default btn-circle"
                                        data-id="{{$l->id}}"
                                        data-karid="{{$l->karyawan_id}}"
                                        data-nama="{{$l->nama}}"
                                        data-awal="{{$l->waktu_awal}}"
                                        data-akhir="{{$l->waktu_akhir}}"
                                        data-keterangan="{{$l->keterangan}}"
                                        data-kendaraan="{{ $l->jenis_kendaraan }} {{ $l->merk }} ({{ $l->plat }})"
                                        data-toggle="modal" data-target="#acc"><i class="fa fa-check"></i>
                                    </button>
                                    <button class="btn btn-default btn-circle"
                                    data-id="{{$l->id}}"
                                    data-karid="{{$l->karyawan_id}}"
                                    data-nama="{{$l->nama}}"
                                    data-awal="{{$l->waktu_awal}}"
                                    data-akhir="{{$l->waktu_akhir}}"
                                    data-keterangan="{{$l->keterangan}}"
                                    data-kendaraan="{{ $l->jenis_kendaraan }} {{ $l->merk }} ({{ $l->plat }})"
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
                <h4 class="modal-title">Approval Permintaan Pemakaian Kendaraan Dinas</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/ppkd/acc')}}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id"/>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Waktu Mulai</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="awal" id="awal" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Waktu Selesai</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="akhir" id="akhir" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Kendaraan</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="kendaraan" id="kendaraan" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Keperluan</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="keterangan" id="keterangan" readonly></div>
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
                <h4 class="modal-title">Tolak Permintaan Pemakaian Kendaraan Dinas</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/ppkd/tolak')}}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id"/>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nama" id="nama" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Waktu Mulai</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="awal" id="awal" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Waktu Selesai</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="akhir" id="akhir" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Kendaraan</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="kendaraan" id="kendaraan" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Keperluan</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="keterangan" id="keterangan" readonly></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Alasan Penolakan</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="notes" id="notes" required></div>
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
            responsive: true
        } );
        new $.fn.dataTable.FixedHeader( table );
    });

    $('#acc').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal

        var id = button.data('id');
        var karid = button.data('karid');
        var nama = button.data('nama');
        var awal = button.data('awal');
        var akhir = button.data('akhir');
        var waktu = button.data('waktu');
        var keterangan = button.data('keterangan');
        var kendaraan = button.data('kendaraan');

        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #karid').val(karid);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #awal').val(awal);
        modal.find('.modal-body #akhir').val(akhir);
        modal.find('.modal-body #waktu').val(waktu);
        modal.find('.modal-body #keterangan').val(keterangan);
        modal.find('.modal-body #kendaraan').val(kendaraan);
    });

    $('#tolak').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal

        var id = button.data('id');
        var karid = button.data('karid');
        var nama = button.data('nama');
        var awal = button.data('awal');
        var akhir = button.data('akhir');
        var waktu = button.data('waktu');
        var keterangan = button.data('keterangan');
        var kendaraan = button.data('kendaraan');

        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #karid').val(karid);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #awal').val(awal);
        modal.find('.modal-body #akhir').val(akhir);
        modal.find('.modal-body #waktu').val(waktu);
        modal.find('.modal-body #keterangan').val(keterangan);
        modal.find('.modal-body #kendaraan').val(kendaraan);
    });
</script>
@endsection

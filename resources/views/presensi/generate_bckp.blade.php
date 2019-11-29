@extends('main')

@section('title', 'Presensi')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Presensi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li>
                    <a>Presensi</a>
                </li>
                <li class="active">
                    <strong>Generate Presensi</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Absensi Pegawai</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generate">Generate Presensi</button>
                        </div>

                        <div class="modal inmodal fade" id="generate" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Generate Presensi</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/hrd/sdm/smi/tambah')}}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                                                <div class="col-sm-10"><input type="text" class="form-control input-sm" name="nama" id="nama" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">No KTP</label>
                                                <div class="col-sm-10  "><input type="text" class="form-control input-sm" name="ktp" id="ktp"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Lahir</label>
                                                <div class="col-sm-10"><input type="text" class="form-control date input-sm" name="tanggal_lahir" id="tanggal_lahir" value="{{ \Carbon\Carbon::now()->toDateString() }}"></div>
                                            </div>
{{--                                            <div class="form-group"><label class="col-sm-4 control-label">Tempat Lahir</label>--}}
{{--                                                <div class="col-sm-8"><input type="text" class="form-control input-sm" name="tempat_lahir" id="tempat_lahir" ></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group"><label class="col-sm-4 control-label">Email</label>--}}
{{--                                                <div class="col-sm-8"><input type="email" class="form-control input-sm" name="email" id="email" ></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group"><label class="col-sm-4 control-label">Alamat</label>--}}
{{--                                                <div class="col-sm-8"><input type="text" class="form-control input-sm" name="alamat" id="alamat" ></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group"><label class="col-sm-4 control-label">Jenis Kelamin</label>--}}
{{--                                                <div class="col-sm-8">--}}
{{--                                                    <select class="form-control chosen-select-width" name="jeniskelamin" id="jeniskelamin" required>--}}
{{--                                                        <option value="" disabled>- pilih jenis kelamin -</option>--}}
{{--                                                        <option value="0">Perempuan</option>--}}
{{--                                                        <option value="1">Laki-Laki</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group"><label class="col-sm-4 control-label">Penempatan</label>--}}
{{--                                                <div class="col-sm-8">--}}
{{--                                                    <select class="form-control chosen-select-width" name="client" id="client" required>--}}
{{--                                                        @foreach($md_client as $p)--}}
{{--                                                            <option value="{{$p->id}}">{{$p->nama_client}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Generate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Tgl Jadwal Masuk</th>
                                        <th>Jam Jadwal Masuk</th>
                                        <th>Tgl Masuk</th>
                                        <th>Jam Masuk</th>
                                        <th>Tgl Jadwal Pulang</th>
                                        <th>Jam Jadwal Pulang</th>
                                        <th>Tgl Pulang</th>
                                        <th>Jam Pulang</th>
                                        <th>Menit Terlambat</th>
                                        <th>Menit Pulang Cepat</th>
                                        <th>Menit Lembur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($presensi as $p)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->tgl_jadwal }}</td>
                                        <td>{{ $p->jam_jadwal }}</td>
                                        <td>{{ $p->tgl_masuk }}</td>
                                        <td>{{ $p->jam_masuk }}</td>
                                        <td>{{ $p->tgl_jadwal_pulang }}</td>
                                        <td>{{ $p->jam_jadwal_pulang }}</td>
                                        <td>{{ $p->tgl_pulang }}</td>
                                        <td>{{ $p->jam_pulang }}</td>
                                        <td>{{ $p->mnt_terlambat }}</td>
                                        <td>{{ $p->mnt_plgcpt }}</td>
                                        <td>{{ $p->mnt_lembur }}</td>
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

@endsection

@section('extra_scripts')
    <!-- FooTable -->
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                scrollX: true
            } );
            new $.fn.dataTable.FixedHeader( table );
        });
    </script>
@endsection

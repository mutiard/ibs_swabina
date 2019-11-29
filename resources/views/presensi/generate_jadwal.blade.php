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
                    <strong>Generate Jadwal</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Jadwal Pegawai</h5>
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
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#site">Generate Jadwal Per Site</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#personal">Generate Jadwal Personal</button>
                            <button type="button" class="btn btn-green" data-toggle="modal" data-target="#nonpola">Generate Jadwal Non Pola</button>
                        </div>

                        <div class="modal inmodal fade" id="site" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Generate Jadwal Per Site</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/presensi/generate/jadwal/persite')}}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

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
                                            <div class="form-group">
                                                <label style="text-align: left" class="col-sm-2 control-label">Pola Jadwal</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control inputstl" id="pola" name="pola" required>
                                                        @foreach($pola as $k)
                                                            <option value="{{$k->kode}}">{{ $k->deskripsi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
{{--                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Awal (Senin)</label>--}}
{{--                                                <div class="col-sm-10"><input type='text' name='datepicker' id='datepicker' placeholder='Date:' class='form-control'></div>--}}
{{--                                            </div>--}}
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Awal (Senin)</label>
                                                <div class="col-sm-10"><input type="date" class="form-control date" name="sdate" id="sdate" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Akhir (Minggu)</label>
                                                <div class="col-sm-10"><input type="date" class="form-control date" name="edate" id="edate" required></div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Generate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal inmodal fade" id="personal" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Generate Jadwal Personal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/presensi/generate/jadwal/personal')}}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label style="text-align: left" class="col-sm-2 control-label">Nama Pegawai</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control inputstl" id="Nama" name="id" required>
                                                        @foreach($kar as $k)
                                                            <option value="{{$k->id}}">{{$k->nama}} - {{ $k->site }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label style="text-align: left" class="col-sm-2 control-label">Pola Jadwal</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control inputstl" id="pola" name="pola" required>
                                                        @foreach($pola as $k)
                                                            <option value="{{$k->kode}}">{{ $k->deskripsi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Awal (Senin)</label>
                                                <div class="col-sm-10"><input type="date" class="form-control date" name="sdate" id="sdate" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal Akhir (Minggu)</label>
                                                <div class="col-sm-10"><input type="date" class="form-control date" name="edate" id="edate" required></div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Generate</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal inmodal fade" id="nonpola" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Generate Jadwal Non Pola</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('/presensi/generate/jadwal/nonpola')}}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label style="text-align: left" class="col-sm-2 control-label">Nama Pegawai</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control inputstl" id="Nama" name="id" required>
                                                        @foreach($kar as $k)
                                                            <option value="{{$k->id}}">{{$k->nama}} - {{ $k->site }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Tanggal</label>
                                                <div class="col-sm-10"><input type="date" class="form-control date" name="date" id="date" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Start Time</label>
                                                <div class="col-sm-10"><input type="time" step="2" class="form-control time" name="stime" id="stime" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">End Time</label>
                                                <div class="col-sm-10"><input type="time" step="2" class="form-control time" name="etime" id="etime" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Pola</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="pola" id="pola" value="Non" readonly></div>
                                            </div>

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
                                        <th>Nama</th>
                                        <th>Start Date</th>
                                        <th>Start Time</th>
                                        <th>End Date</th>
                                        <th>End Time</th>
                                        <th>Pola</th>
                                        <th style="width: 7%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($jadwal as $p)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->sdate }}</td>
                                        <td>{{ $p->stime }}</td>
                                        <td>{{ $p->edate }}</td>
                                        <td>{{ $p->etime }}</td>
                                        <td>{{ $p->deskripsi }}</td>
                                        <td style="text-align : center;">
                                            <button class="btn btn-default btn-circle"
                                                    data-id="{{$p->id}}"
                                                    data-user="{{$p->nama}}"
                                                    data-nik="{{$p->nik}}"
                                                    data-sdate="{{$p->sdate}}"
                                                    data-stime="{{$p->stime}}"
                                                    data-edate="{{$p->edate}}"
                                                    data-etime="{{$p->etime}}"
                                                    data-desk="{{$p->deskripsi}}"
                                                    data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i>
                                            </button>
{{--                                            <button class="btn btn-default btn-circle"--}}
{{--                                                    data-id="{{$u->id}}"--}}
{{--                                                    data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i>--}}
{{--                                            </button>--}}
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

    {{-- Update --}}
    <div class="modal inmodal fade" id="edit" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Edit Jadwal Pegawai</h4>
                </div>
                <form method="POST" action="{{ url('/presensi/generate/jadwal/edit') }}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="" />
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">NIK</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="nik" id="nik" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Nama</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="user" id="user" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Start Date</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="sdate" id="sdate"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">Start Time</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="stime" id="stime" ></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">End Date</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="edate" id="edate" ></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label" style="text-align: left">End Time</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="etime" id="etime" ></div>
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

@endsection

@section('extra_scripts')
    <!-- FooTable -->
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Page-Level Scripts -->
    <script>
        // $(function() {
        //     $("#datepicker").datepicker({
        //         minDate:0,
        //         beforeShowDay: function (date) {
        //             //getDate() returns the day (0-31)
        //             if (date.getDay() == 1 ) {
        //                 return [true, ''];
        //             }
        //             return [false, ''];
        //         }
        //     });
        // });
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY/MM/DD'
                }
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });
        });
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                scrollX: true
            } );
            new $.fn.dataTable.FixedHeader( table );
        });

        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal

            var id = button.data('id');
            var user = button.data('user');
            var nik = button.data('nik');
            var sdate = button.data('sdate');
            var stime = button.data('stime');
            var edate = button.data('edate');
            var etime = button.data('etime');
            var desk = button.data('desk');

            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #user').val(user);
            modal.find('.modal-body #nik').val(nik);
            modal.find('.modal-body #sdate').val(sdate);
            modal.find('.modal-body #stime').val(stime);
            modal.find('.modal-body #edate').val(edate);
            modal.find('.modal-body #etime').val(etime);
            modal.find('.modal-body #desk').val(desk);
        });
    </script>
@endsection

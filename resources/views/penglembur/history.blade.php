@extends('main')

@section('title', 'Lembur')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Lembur</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li>
                    <a>Lembur</a>
                </li>
                <li>
                    <a>Data Lembur</a>
                </li>
                <li class="active">
                    <strong>History</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data History Lembur</h5>
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
                                        <th>Waktu Lembur</th>
                                        <th>Keterangan</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($lembur as $l)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $l->karyawan_id }}</td>
                                        <td>{{ $l->nama }}</td>
                                        <td>{{ $l->site }}</td>
                                        <td>{{ $l->waktu_awal }}</td>
                                        <td>{{ $l->waktu_akhir }}</td>
                                        @if($l->waktu_lembur == 1)
                                            <td>Sebelum</td>
                                        @else
                                            <td>Sesudah</td>
                                        @endif
                                        <td>{{ $l->keterangan }}</td>
                                        <td>{{ $l->notes }}</td>
                                        @if($l->acc == 1)
                                            <td style="text-align: center"><button type="button" class="btn btn-success btn-sm">Approved</button></td>
                                        @else($l->acc == 2)
                                            <td style="text-align: center"><button type="button" class="btn btn-danger btn-sm">Rejected</button></td>
                                        @endif
{{--                                        <button id="waiting_btn" type="button" class="btn btn-warning btn-sm">Waiting</button>--}}

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
            scrollX:true
        } );
        new $.fn.dataTable.FixedHeader( table );
    });
</script>
@endsection

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
                        <h5>Data History</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Site</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal</th>
                                        <th>Tanggal Batas</th>
                                        <th>Kategori</th>
                                        <th>In Qty</th>
                                        <th>Out Qty</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Keterangan Penolakan</th>
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
                                        <td>{{ $l->tgl }}</td>
                                        <td>{{ $l->tgl_batas }}</td>

                                        @if($l->kategori == 1)
                                            <td style="text-align: center"><button type="button" class="btn btn-danger btn-sm">Sakit</button></td>
                                        @elseif($l->kategori == 2)
                                            <td style="text-align: center"><button type="button" class="btn btn-success btn-sm">Cuti</button></td>
                                        @else
                                            <td style="text-align: center"><button type="button" class="btn btn-warning btn-sm">Dispensasi</button></td>
                                        @endif

                                        <td>{{ $l->in_qty }}</td>
                                        <td>{{ $l->out_qty }}</td>
                                        <td>{{ $l->keterangan }}</td>

                                        @if($l->acc == 1)
                                            <td style="text-align: center"><button type="button" class="btn btn-block btn-sm" style="color: blue">Approved</button></td>
                                        @elseif($l->acc == 2)
                                            <td style="text-align: center"><button type="button" class="btn btn-block btn-sm" style="color: red">Rejected</button></td>
                                        @endif

                                        @if($l->ket_acc == (NULL))
                                            <td> - </td>
                                        @else
                                            <td>{{ $l->ket_acc }}</td>
                                        @endif
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

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
                    <strong>Jadwal Perizinan</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Jadwal Perizinan</h5>
                    </div>
                    <div class="ibox-content">
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
            scrollX: true
        } );
        new $.fn.dataTable.FixedHeader( table );
    });
</script>
@endsection

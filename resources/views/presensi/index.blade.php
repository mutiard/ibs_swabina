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
                    <strong>Daftar Absensi</strong>
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
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
{{--                                        <th>Foto</th>--}}
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Site</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($presensi as $p)
                                    <tr>
                                        <td>{{ $i }}</td>
{{--                                        <td><img src="https://api-smi.myabsensi.com/common/files/absensi-online/{{$p->foto}}" style="width: 50px; height: 50px"/></td>--}}
                                        <td>{{$p->nik}}</td>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->site}}</td>
{{--                                        <td>{{$p->scan_date}}</td>--}}
                                        <td>{{$tgl[$i-1]}}</td>
                                        <td>{{$jam[$i-1]}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-primary btn" type="button" href="http://www.google.com/maps/place/{{$p->lat}},{{$p->lng}}"><i class="fa fa-location-arrow"></i><small> Cek Lokasi</small></a>
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

@endsection

@section('extra_scripts')
<!-- FooTable -->
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true
        } );
        new $.fn.dataTable.FixedHeader( table );
    });
</script>
@endsection

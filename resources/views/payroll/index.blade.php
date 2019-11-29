@extends('main')

@section('title', 'Payroll')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Generate Payroll</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Generate Payroll</strong>
                </li>
            </ol>

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>List SDM</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
{{--                        {{url('/hrd/payroll/generate')}}--}}
                        <form method="POST" id="postForm" action="" class="form-horizontal" enctype="multipart/form-data" onsubmit="return postForm()">
                            @csrf
                            <div class="form-group" id="form-kelas">
{{--                                <label class="font-normal" for="id_kelas">Lokasi Penempatan</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>--}}
{{--                                    <select data-placeholder="Pilih Kelas" name="group" id="id_kelas" class="form-control chosen-select select-kelas">--}}
{{--                                        @foreach($client as $c)--}}
{{--                                            <option value="{{ $c->id }}">{{$c->nama_client}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <br>
                                <label class="font-normal" for="id_kelas">Periode</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="select2_demo_1 form-control" name="bulan">
                                            <option></option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <select class="select2_demo_3 form-control" name="tahun">
                                            <option></option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                        </select>
                                    </div>
                                    {{--                                <div class="col-md-2">--}}
                                    {{--                                <button class="btn btn-success btn-block m-t"><i class="fa fa-sync"></i> Generate Payroll</button>--}}
                                    {{--                                </div>--}}
                                    <div class="col-md-4">
                                        <button class="btn btn-block btn-primary" type="submit">GENERATE PAYROLL</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </form>
                        <br>
                        <input type="text" class="form-control input-sm m-b-xs" id="filter"
                               placeholder="Pencarian">

                        <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                            <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
{{--                                <th>Kode Gaji</th>--}}
                                <th style="text-align: center">Bulan</th>
                                <th style="text-align: center">Tahun</th>
                                <th style="text-align: center">Gaji</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $u)
                                <tr class="gradeX">
                                    <td class="center">{{ $u->id }}</td>
                                    <td class="center">{{ $u->nama }}</td>
{{--                                    <td class="center">{{ $u->kode_gaji }}</td>--}}
{{--                                    <td class="center" style="text-align: center">{{ $u->bln }}</td>--}}
                                    <td class="center" style="text-align: center">{{ date('F', mktime(0, 0, 0, $u->bln, 10)) }}</td>
                                    <td class="center" style="text-align: center">{{ $u->thn }}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-default btn" type="button" href="{{url('payroll/slipgaji',$u->kode_gaji)}}"><i class="fa fa-envelope"></i><small>&nbsp Slip Gaji</small></a>
                                    </td>
                                </tr>
                            @endforeach
                            <td colspan="5">
                                <ul class="pagination pull-right"></ul>
                            </td>
                            </tbody>
                        </table>
                        Halaman : {{ $data->currentPage() }} <br/>
                        Jumlah Data : {{ $data->total() }} <br/>
                        Data Per Halaman : {{ $data->perPage() }} <br/>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('extra_scripts')
    <!-- FooTable -->
    <script src="{{asset('inspinia/js/plugins/footable/footable.all.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });
        $(".select2_demo_1").select2({
            placeholder: "Pilih Bulan",
            allowClear: true
        });
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Pilih Tahun",
            allowClear: true
        });
    </script>
@endsection

@extends('main')

@section('title', 'Slip')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Slip Gaji</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Slip Gaji</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Dari:</h5>
                                <address>
                                    <strong>PT. Swabina Gatra</strong><br>
                                    Jl. R.A. Kartini No.21 A, Injen Timur, Gapurosukolilo<br>
                                    Kec. Gresik<br>
                                    Kabupaten Gresik<br>
                                    Jawa Timur<br>
                                    61122<br>
{{--                                    admin@infobisnissolusi.co.id<br>--}}
                                    kontak@swabinagatra.co.id<br>
                                </address>
                            </div>

                            <div class="col-sm-6 text-right">
                                <h4>No. Slip Gaji</h4>
                                <h4 class="text-navy">{{ $kode_gaji }}</h4>
                                <span>Kepada:</span>
                                <address>
                                    <strong>{{ $kar->nama }}</strong><br>
                                    {{--                                      PT. Semangat Baru<br>--}}
                                </address>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="table-responsive m-t">
                                    <table class="table invoice-table">
                                        <thead>
                                        <th>Pendapatan</th>
                                        <th></th>
                                        </thead>
                                        <thead>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>Nilai</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($num = 0; $num < $index; $num++)
                                            <tr>
                                                <td>{{ $label[$num] }}</td>
                                                <td>{{ $nilai[$num] }}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div><!-- /table-responsive -->

                                <table class="table invoice-total">
                                    <tbody>
                                    <tr>
                                        <td><strong>Total Pendapatan :</strong></td>
                                        <td>{{ $total_pen }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-6 text-right">
                                <div class="table-responsive m-t">
                                    <table class="table invoice-table">
                                        <thead>
                                        <th>Potongan</th>
                                        <th></th>
                                        </thead>
                                        <thead>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>Nilai</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($num=0; $num<$index_pot; $num++)
                                            <tr>
                                                <td style="text-align: left">{{ $label_pot[$num] }}</td>
                                                <td>{{ $nilai_pot[$num] }}</td>
                                            </tr>
                                        @endfor
                                        {{--                                  <tr>--}}
                                        {{--                                      <td>Potongan BPJS</td>--}}
                                        {{--                                      <td>0</td>--}}
                                        {{--                                  </tr>--}}
                                        {{--                                  <tr>--}}
                                        {{--                                      <td>Potongan Pinjaman</td>--}}
                                        {{--                                      <td>0</td>--}}
                                        {{--                                  </tr>--}}
                                        <tr>
                                            <td><strong>Total Potongan :</strong></td>
                                            <td>{{ $tot_pot }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <br><br><br>
                                </div><!-- /table-responsive -->

                                <table class="table invoice-total">
                                    <tbody>
                                    <tr>
                                        <td><strong>Total Pendapatan :</strong></td>
                                        <td>{{ $total_pen }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Potongan :</strong></td>
                                        <td>{{ $tot_pot }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Take Home Pay :</strong></td>
                                        <td>{{ $tot }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });



    </script>
@endsection

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
                    <a>SPL</a>
                </li>
                <li class="active">
                    <strong>Form Pengajuan</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Pengajuan Lembur</h5>
                    </div>
                    <div>
                        <div class="ibox-content">
{{--                            {{url('/penglembur/store')}}--}}
                            <form method="POST" id="postForm" action="{{url('/penglembur/store')}}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return postForm()">
                                @csrf
                                <div class="form-group">
                                    <label style="text-align: left" class="col-sm-2 control-label">Waktu Pengajuan</label>
                                    <div class='col-sm-5 input-group date' id='dtpickerdemo'>
                                        <input type="text" name="datetimes" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="text-align: left" class="col-sm-2 control-label">Waktu Lembur</label>
                                    <div class="col-sm-5 input-group">
                                        <select class="form-control inputstl" id="waktu" name="waktu" required>
                                                <option value="">-- Pilih Waktu Lembur --</option>
                                                <option value="1">Sebelum</option>
                                                <option value="2">Sesudah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label style="text-align: left" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-5 input-group">
                                        <select class="form-control inputstl" id="Nama" name="id" required>
                                            @foreach($kar as $k)
                                                <option value="{{$k->id}}">{{ $k->site }} - {{$k->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label style="text-align: left" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-5 input-group">
                                        <input type="text" class="form-control inputstl" id="keterangan" placeholder="Keterangan lembur" name="keterangan" value="Lembur" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-6 col-sm-3">
{{--                                        <button type="button" class="btn btn-danger">Cancel</button>--}}
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

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

                            </form>
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
{{--    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>--}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Page-Level Scripts -->
<script type="text/javascript">
    $(function() {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            timePicker24hours: true,
            timePickerIncrement: 10,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour'),
            locale: {
                format: 'Y-M-D H:mm:ss'
            }
        });
    });
</script>

@endsection

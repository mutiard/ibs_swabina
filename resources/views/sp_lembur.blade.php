@extends('main')

@section('title', 'dashboard')

@section('extra_styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>th.dt-center, td.dt-center { text-align: center; }</style>
<style>
  .dotted {border-style: dotted;}
  .dashed {border-style: dashed;}
  .solid {border-style: solid;}
  .double {border-style: double;}
  .groove {border-style: groove;}
  .ridge {border-style: ridge;}
  .inset {border-style: inset;}
  .outset {border-style: outset;}
  .none {border-style: none;}
  .hidden {border-style: hidden;}
  .mix {border-style: dotted dashed solid double;}
</style>
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Surat Pengajuan Lembur</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('home')}}">Dashboard</a>
            </li>
            <li>Surat Pengajuan</li>
            <li class="active">SP Lembur</li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="alert alert-danger pesan" style="display:none;">
          <ul></ul>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Form Surat Pengajuan Lembur</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form role="form" method="post" action="{{ url('sp_lembur/submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nik" id="nik" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h4 style="color: brown">Waktu Pengajuan Lembur :</h4>
                        </div>
                        <div class="form-group row">
                            <label for="jadwal" class="col-sm-3 col-form-label">Periode Lembur</label>
                            <div class="col-sm-9">
                                <select class="form-control chosen-select-width5" name="jadwal">
                                    <option value="" selected disabled>- periode -</option>
                                    <option value="0">Pra Jam Kerja</option>
                                    <option value="1">Post Jam Kerja</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Waktu</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="waktu" name="datetimes" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                         <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="keterangan" id="keterangan"  required="">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-9">
                                <a href="{{url('sp_lembur')}}" class="btn btn-danger btn-flat" type="button">Batal</a>
                                <button class="ladda-button ladda-button-demo btn btn-primary btn-flat simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(function() {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(1, 'hour'),
            locale: {
                format: 'Y-M-D H:mm'
            }
        });
    });
</script>

@endsection


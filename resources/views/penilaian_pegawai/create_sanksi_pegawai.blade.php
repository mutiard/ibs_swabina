@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

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
    <h2>Input Sanksi Pegawai</h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Hubnaker</a>
      </li>
      <li>
        <a>Data Sanksi Pegawai</a>
      </li>
      <li class="active">
        <strong>Input Sanksi Pegawai</strong>
      </li>

    </ol>
  </div>
  <div class="col-lg-2">

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
          <h5>Input Sanksi Pegawai</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <form id="form-pekerja" data-parsley-validate="" method="POST" action="{{url('store_sanksi_pegawai')}}" enctype="multipart/form-data">
            @csrf
            @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @elseif(session('alert'))
            <div class="alert alert-danger">
              {{ session('alert') }}
            </div>
            @endif
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Nama Pegawai</label>
              <div class="col-sm-10">
                <select data-placeholder="Pilih Pegawai" name="id_karyawan" id="id_karyawan" class="form-control select2" required="">
                  <option value="">--Pilih Pegawai--</option>
                  @foreach($data_karyawan as $value)
                  <option value="{{$value->id}}">{{$value->nama}}
                    @if($value->karyawan_sp() != NULL)
                    [{{$value->karyawan_sp()}}]
                    @else
                    @endif
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Jenis Sanksi Pegawai</label>
              <div class="col-sm-10">
                <select data-placeholder="Pilih Sanksi" name="jenis_sp" id="jenis_sp" class="form-control select2" required="">
                  <option value="">--Pilih Sanksi--</option>
                  <option value="SP 1">SP 1</option>
                  <option value="SP2">SP 2</option>
                  <option value="SP 3">SP 3</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="alasan_sp" class="col-sm-2 col-form-label">Alasan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alasan_sp" id="alasan_sp" placeholder="Alasan dikenakan sanksi" required="">
              </div>
            </div>
            <div class="form-group row">
              <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai"  required="">
              </div>
              <label for="tanggal_selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai"  required="">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row">
              <div class="col-sm-4 col-sm-offset-9">
                <a href="{{url('manajemen-pekerja/data-pekerja')}}" class="btn btn-danger btn-flat" type="button">Kembali</a>
                <button class="ladda-button ladda-button-demo btn btn-primary btn-flat simpan" type="submit" >
                  Simpan
                </button>
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
<script type="text/javascript">
  $(document).ready(function () {
    const select2 = $('.select2');
    select2.select2();
  });
</script>
@endsection


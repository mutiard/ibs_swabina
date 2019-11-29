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
    <h2> Input List Spesifikasi </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Kepegawaian</a>
      </li>
      <li>
        <a>Pengajuan APD</a>
      </li>
      <li class="active">
        <strong> Input List Spesifikasi </strong>
      </li>

    </ol>
  </div>
  <div class="col-lg-2">

  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" >
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Input List Spesifikasi</h5>
        </div>
        <div class="ibox-content">
          <form method="POST" class="form-horizontal" action="{{url('updatekaryawan')}}/{{$karyawan->id}}" enctype="multipart/form-data">
            @method('PUT')
            {{csrf_field()}}
            <fieldset>
              @if(count($errors)>0)
              @foreach($errors->all() as $error)
              <div class="alert alert-danger">{{$error}}</div>
              @endforeach
              @elseif(session('alert'))
              <div class="alert alert-danger">
                {{ session('alert') }}
              </div>
              @endif
              <div class="form-group"><label class="col-sm-2 control-label">NIK</span></label>
                <div class="col-sm-10"><input type="text" class="form-control" value="{{$karyawan->id}}" readonly=""></div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10"><input type="text" class="form-control" value="{{$karyawan->nama}}" readonly=""></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Lahir</label>
                <div class="col-sm-4"><input type="text" class="form-control" value="{{$karyawan->tempat_lahir}}" readonly=""></div>
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-4"><input type="text" class="form-control" value="{{ date('d F Y', strtotime($karyawan->tanggal_lahir)) }}" readonly=""></div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10"><input type="text" class="form-control" value="{{$karyawan->alamat}}" readonly=""></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-4"><input type="text" class="form-control" value="{{$karyawan->jenis_kelamin}}" readonly=""></div>
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-4"><input type="text" class="form-control" value="{{$karyawan->agama}}" readonly=""></div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label">No. KTP</label>
                <div class="col-sm-10"><input type="text" class="form-control" value="{{$karyawan->no_ktp}}" readonly=""></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tinggi Badan (cm)</label>
                <div class="col-sm-4"><input type="number" class="form-control" value="{{$karyawan->tinggi_badan}}" name="tinggi_badan" placeholder="Masukkan Tinggi Badan" onKeyPress="if(this.value.length>=3 ) return false;"></div>
                <label class="col-sm-2 control-label">Berat Badan (kg)</label>
                <div class="col-sm-4"><input type="number" class="form-control" value="{{$karyawan->berat_badan}}" name="berat_badan" placeholder="Masukkan Berat Badan" onKeyPress="if(this.value.length>=3 ) return false;"></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ukuran Baju</label>
                <div class="col-sm-2"><input type="text" class="form-control" value="{{$karyawan->ukuran_baju}}" name="ukuran_baju" placeholder="Ukuran Baju" onKeyPress="if(this.value.length>=3 ) return false;"></div>
                <label class="col-sm-2 control-label">Ukuran Celana</label>
                <div class="col-sm-2"><input type="text" class="form-control" value="{{$karyawan->tinggi_badan}}" name="ukuran_celana" placeholder="Ukuran Celana" onKeyPress="if(this.value.length>=3 ) return false;"></div>
                <label class="col-sm-2 control-label">Ukuran Sepatu</label>
                <div class="col-sm-2"><input type="number" class="form-control" value="{{$karyawan->ukuran_sepatu}}" name="ukuran_sepatu" placeholder="Ukuran Sepatu" onKeyPress="if(this.value.length>=3 ) return false;"></div>
              </div>
              <!-- <div class="form-group"><label class="col-sm-2 control-label">Upload Foto</label>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                  <span class="fileinput-exists">Change</span><input type="file" name="path_foto"/></span>
                  <span class="fileinput-filename"></span>
                  <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                </div>
              </div> -->
            </fieldset>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <div class="col-sm-4 col-sm-offset-2">
                <a href="{{url('datakaryawan')}}">
                  <button type="button" class="btn btn-white">Cancel</button>
                </a>
                <button class="btn btn-primary" type="submit">Save changes</button>
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
    const select2 = $('.chosen-select-width5');
    select2.select2();


    const provinsi = $('#kota');
    const kabkota = $('#kec');

    const urlKabkota = '{{ url("/getkecamatan") }}';

    provinsi.select2();
    kabkota.select2();

    dynamicSelect2(provinsi, urlKabkota, kabkota);
  });
</script>
@endsection


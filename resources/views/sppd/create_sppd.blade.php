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
    <h2> Pengajuan Surat Perintah Perjalanan Dinas </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Atasan</a>
      </li>
      <li class="active">
        <strong> Pengajuan Surat Perintah Perjalanan Dinas </strong>
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
  <form id="form-pekerja" data-parsley-validate="" method="POST" action="#" enctype="multipart/form-data">
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
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Pengajuan Surat Perintah Perjalanan Dinas</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="form-group row">
              <div class="col-sm-12">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Pejabat berwenang yang memberi perintah</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pendidikan" placeholder="Pejabat berwenang" required=""></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Nama/NIP Pegawai yang diperintahkan</td>
                      <td>
                        <select class="form-control select2" style="width: 100%" id="karyawan_id" name="karyawan_id" required>
                          @foreach($kar as $k)
                          <option value="{{$k->id}}">{{ $k->site }} - {{$k->nama}}</option>
                          @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td rowspan="3">3.</td>
                      <td>a. Pangkat dan golongan ruang gaji menurut PP No.6 tahun 1997</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Pangkat dan golongan" required=""></td>
                    </tr>
                    <tr>
                      <td>b. Jabatan/Instansi</td>
                      <td><input type="text" class="form-control" name="spesifikasi_keterampilan" placeholder="Jabatan/Instansi" required=""></td>
                    </tr>
                    <tr>
                      <td>c. Tingkat menurut peraturan perjalanan dinas</td>
                      <td><input type="text" class="form-control" name="spesifikasi_keterampilan" placeholder="Tingkat" required=""></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Maksud perjalanan dinas</td>
                      <td><input type="text" class="form-control" name="spesifikasi_keterampilan" placeholder="Maksud perjalanan dinas" required=""></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Alat angkutan yang dipergunakan</td>
                      <td><input type="text" class="form-control" name="spesifikasi_keterampilan" placeholder="Alat angkutan" required=""></td>
                    </tr>
                    <tr>
                      <td rowspan="2">6.</td>
                      <td>a. Tempat Berangkat</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Tempat Berangkat" required=""></td>
                    </tr>
                    <tr>
                      <td>b. Tempat Tujuan</td>
                      <td><input type="text" class="form-control" name="spesifikasi_keterampilan" placeholder="Tempat Tujuan" required=""></td>
                    </tr>
                    <tr>
                      <td rowspan="3">7.</td>
                      <td>a. Lamanya perjalanan</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Lamanya perjalanan" required=""></td>
                    </tr>
                    <tr>
                      <td>b. Tanggal Berangkat</td>
                      <td><input type="date" class="form-control" name="spesifikasi_keterampilan" placeholder="Spesifikasi Keterampilan" required=""></td>
                    </tr>
                    <tr>
                      <td>c. Tanggal Harus Kembali</td>
                      <td><input type="date" class="form-control" name="spesifikasi_keterampilan" placeholder="Spesifikasi Keterampilan" required=""></td>
                    </tr>
                    <tr>
                      <td>8.</td>
                      <td>Pengikut</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Pengikut" required=""></td>
                    </tr>
                    <tr>
                      <td>9.</td>
                      <td>Pembahasan anggaran:<br>a. Instansi<br>b. Fungsi/ Subfungsi/Program/Kegiatan MAK</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Anggaran" required=""></td>
                    </tr>
                    <tr>
                      <td>10.</td>
                      <td>Keterangan lain-lain</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Keterangan lain-lain" required=""></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <button class="ladda-button ladda-button-demo btn btn-primary btn-flat simpan" type="submit" >
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
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


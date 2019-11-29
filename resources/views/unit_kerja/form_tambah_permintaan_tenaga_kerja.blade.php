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
    <h2>Proses Kontrak</h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Pemasaran</a>
      </li>
      <li class="active">
        <strong>Proses Kontrak</strong>
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
          <h5>Proses Kontrak</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <form id="form-pekerja" data-parsley-validate="" method="POST" action="{{url('admin/form/store_permintaan_tenaga_kerja')}}" enctype="multipart/form-data">
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
              <label for="expired" class="col-sm-2 col-form-label">Manajer/ Jr Manager</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" value="SDM/Umum" readonly="">
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" name="tanggal_permintaan" id="tanggal_permintaan">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Tanggal Dibutuhkan</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" name="tanggal_dibutuhkan" id="tanggal_dibutuhkan" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="tanggal_dibutuhkan-error">
                  <small>Tanggal Dibutuhkan harus diisi...!</small>
                </span>
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Jumlah Yang Dibutuhkan</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" placeholder="Jumlah Yang Dibutuhkan" onKeyPress="if(this.value.length>=3 ) return false;" name="jumlah_yg_dibutuhkan" id="jumlah_yg_dibutuhkan" required="">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="jumlah_yg_dibutuhkan-error">
                  <small>Jumlah Yang Dibutuhkan harus diisi...!</small>
                </span>
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="jabatan" id="jabatan" required="" onKeyPress="if(this.value.length>=20 ) return false;" placeholder="Jabatan">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="jabatan-error">
                  <small>Jabatan harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Tambahan</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="tambahan" id="tambahan">
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Tetap</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="tetap" id="tetap">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Pria</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="pria" id="pria">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Jam Kerja Biasa</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="jam_kerja_biasa_pria" id="jam_kerja_biasa_pria">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Malam</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="malam_pria" id="malam_pria">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Penggantian</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="penggantian" id="penggantian">
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Sementara</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="sementara" id="sementara">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Wanita</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="wanita" id="wanita">
              </div>
              <label for="expired" class="col-sm-1 col-form-label"></label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="jam_kerja_biasa_wanita" id="jam_kerja_biasa_wanita">
              </div>
              <label for="expired" class="col-sm-1 col-form-label"></label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="malam_wanita" id="malam_wanita">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Bila sementara, berapa lama?</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="waktu_sementara" onKeyPress="if(this.value.length>=20 ) return false;" id="waktu_sementara" placeholder="Waktu sementara">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Min</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="min" id="min">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Siapa yang diganti, bila penggantian?</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" onKeyPress="if(this.value.length>=30 ) return false;" name="nama_pengganti" id="nama_pengganti" placeholder="Nama penggantian">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Max</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="max" id="max">
              </div>
              <label for="expired" class="col-sm-1 col-form-label">Khusus</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="khusus" id="khusus">
              </div>
            </div>
            <div class="form-group row">
              <label for="alasan_tambahan_penggantian" class="col-sm-2 col-form-label">Bila tambahan/penggantian tenaga, apa alasannya?</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" onKeyPress="if(this.value.length>=100 ) return false;" name="alasan_tambahan_penggantian" id="alasan_tambahan_penggantian"  required="" placeholder="Alasan tambahan/penggantian">
                <span style="color:#ed5565;display:none" class="help-block m-b-none reset" id="alasan_tambahan_penggantian-error">
                  <small>Alasan harus diisi...!</small>
                </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Syarat Pendidikan</label>
              <label for="expired" class="col-sm-1 checkbox-inline i-checks">SLTP</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="sltp" id="sltp">
              </div>
              <label for="expired" class="col-sm-1 checkbox-inline i-checks">SLTA</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="slta" id="slta">
              </div>
              <label for="expired" class="col-sm-1 checkbox-inline i-checks">Akademis/<br>Sarjana Muda</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="akademis" id="akademis">
              </div>
              <label for="expired" class="col-sm-1 checkbox-inline i-checks">Sarjana</label>
              <div class="col-sm-1">
                <input type="checkbox" value="1" name="sarjana" id="sarjana">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Syarat Pendidikan Khusus</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" onKeyPress="if(this.value.length>=50 ) return false;" name="syarat_pendidikan_khusus" id="syarat_pendidikan_khusus" placeholder="Syarat Pendidikan Khusus">
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Syarat Lain (misal: SIM)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" onKeyPress="if(this.value.length>=50 ) return false;" name="syarat_lain" id="syarat_lain" placeholder="Syarat Lain">
              </div>
            </div>
            <div class="form-group row">
              <label for="alasan_cocok" class="col-sm-2 col-form-label">Apakah ada yang cocok? apa alasannya?</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" onKeyPress="if(this.value.length>=50 ) return false;" name="alasan_cocok" id="alasan_cocok" placeholder="Alasan Cocok">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Diminta Oleh</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Diminta Oleh" onKeyPress="if(this.value.length>=30 ) return false;" name="diminta_oleh" id="diminta_oleh">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-2 col-form-label">Diketahui Oleh (Manajer SDM & Umum)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" onkeydown="return alphaOnly(event);" onKeyPress="if(this.value.length>=30 ) return false;" name="diketahui_oleh" id="diketahui_oleh" placeholder="Diketahui Oleh">
              </div>
              <label for="expired" class="col-sm-2 col-form-label">Disetujui Oleh (Direksi)</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" onkeydown="return alphaOnly(event);" onKeyPress="if(this.value.length>=30 ) return false;" name="disetujui_oleh" id="disetujui_oleh" placeholder="Diketahui Oleh">
              </div>
            </div>
            <div class="form-group row">
              <label for="catatan" class="col-sm-2 col-form-label">Catatan Manager SDM & Umum</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" onkeydown="return alphaOnly(event);" onKeyPress="if(this.value.length>=100 ) return false;" name="catatan" id="catatan" placeholder="Catatan Manager SDM & Umum">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <!-- <a href="{{url('manajemen-pekerja/data-pekerja')}}" class="btn btn-danger btn-flat" type="button">Kembali</a> -->
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
  function alphaOnly(event) {
    var inputValue = event.which;
    if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 && inputValue!= 8 && inputValue!= 44 && inputValue!= 46)) { 
      event.preventDefault(); 
    }
  };
  $(document).ready(function () {
    const select2 = $('.chosen-select-width5');
    select2.select2();
  });
</script>
@endsection


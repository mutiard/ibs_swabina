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

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="alert alert-danger pesan" style="display:none;">
    <ul></ul>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Permintaan Tenaga Kerja ({{$permintaan->id_permintaan}}/Person/1221/{{Carbon\Carbon::parse($permintaan->tanggal_permintaan)->startOfMonth()->format('m')}}.{{Carbon\Carbon::parse($permintaan->tanggal_permintaan)->startOfYear()->format('Y')}})</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Manajer/ Jr Manager</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" value="SDM/Umum" readonly="">
            </div>
            <label for="expired" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" value="{{ date('d F Y', strtotime($permintaan->tanggal_permintaan))}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Tanggal Dibutuhkan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="{{ date('d F Y', strtotime($permintaan->tanggal_dibutuhkan))}}" readonly="">
            </div>
            <label for="expired" class="col-sm-2 col-form-label">Jumlah Yang Dibutuhkan</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" value="{{$permintaan->jumlah_tenaga_kerja}}" readonly="">
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Jabatan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" value="{{$permintaan->jabatan}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Tambahan</label>
            <div class="col-sm-1">
              <input type="checkbox" name="tambahan" id="tambahan" disabled="disabled" value="1" {{ $permintaan->status_tambahan == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-2 col-form-label">Tetap</label>
            <div class="col-sm-1">
              <input type="checkbox" name="tetap" id="tetap" disabled="disabled" value="1" {{ $permintaan->status_tetap == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Pria</label>
            <div class="col-sm-1">
              <input type="checkbox" name="pria" id="pria" disabled="disabled" value="1" {{ $permintaan->status_pria == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Jam Kerja Biasa</label>
            <div class="col-sm-1">
              <input type="checkbox" name="jam_kerja_biasa_pria" id="jam_kerja_biasa_pria" disabled="disabled" value="1" {{ $permintaan->status_jam_kerja_biasa_pria == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Malam</label>
            <div class="col-sm-1">
              <input type="checkbox" name="malam_pria" id="malam_pria" disabled="disabled" value="1" {{ $permintaan->status_jam_malam_pria == '1' ? 'checked' : '' }}>
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Penggantian</label>
            <div class="col-sm-1">
              <input type="checkbox" name="penggantian" id="penggantian" disabled="disabled" value="1" {{ $permintaan->status_penggantian == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-2 col-form-label">Sementara</label>
            <div class="col-sm-1">
              <input type="checkbox" name="sementara" id="sementara" disabled="disabled" value="1" {{ $permintaan->status_sementara == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Wanita</label>
            <div class="col-sm-1">
              <input type="checkbox" name="wanita" id="wanita" disabled="disabled" value="1" {{ $permintaan->status_wanita == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-1">
              <input type="checkbox" name="jam_kerja_biasa_wanita" id="jam_kerja_biasa_wanita" disabled="disabled" value="1" {{ $permintaan->status_jam_kerja_biasa_wanita == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-1">
              <input type="checkbox" name="malam_wanita" id="malam_wanita" disabled="disabled" value="1" {{ $permintaan->status_jam_malam_wanita == '1' ? 'checked' : '' }}>
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Bila sementara, berapa lama?</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="waktu_sementara" id="waktu_sementara" value="{{$permintaan->waktu_sementara}}" readonly="">
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Min</label>
            <div class="col-sm-1">
              <input type="checkbox" name="min" id="min" disabled="disabled" value="1" {{ $permintaan->status_min == '1' ? 'checked' : '' }}>
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Siapa yang diganti, bila penggantian?</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="nama_pengganti" id="nama_pengganti" value="{{$permintaan->nama_pengganti}}" readonly="">
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Max</label>
            <div class="col-sm-1">
              <input type="checkbox" name="max" id="max" disabled="disabled" value="1" {{ $permintaan->status_max == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 col-form-label">Khusus</label>
            <div class="col-sm-1">
              <input type="checkbox" name="khusus" id="khusus" disabled="disabled" value="1" {{ $permintaan->status_khusus == '1' ? 'checked' : '' }}>
            </div>
          </div>
          <div class="form-group row">
            <label for="alasan_tambahan_penggantian" class="col-sm-2 col-form-label">Bila tambahan/penggantian tenaga, apa alasannya?</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alasan_tambahan_penggantian" id="alasan_tambahan_penggantian" value="{{$permintaan->alasan_tambahan_penggantian}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Syarat Pendidikan</label>
            <label for="expired" class="col-sm-1 checkbox-inline i-checks">SLTP</label>
            <div class="col-sm-1">
              <input type="checkbox" name="sltp" id="sltp" disabled="disabled" value="1" {{ $permintaan->status_sltp == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 checkbox-inline i-checks">SLTA</label>
            <div class="col-sm-1">
              <input type="checkbox" name="slta" id="slta" disabled="disabled" value="1" {{ $permintaan->status_slta == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 checkbox-inline i-checks">Akademis/<br>Sarjana Muda</label>
            <div class="col-sm-1">
              <input type="checkbox" name="akademis" id="akademis" disabled="disabled" value="1" {{ $permintaan->status_akademis == '1' ? 'checked' : '' }}>
            </div>
            <label for="expired" class="col-sm-1 checkbox-inline i-checks">Sarjana</label>
            <div class="col-sm-1">
              <input type="checkbox" name="sarjana" id="sarjana" disabled="disabled" value="1" {{ $permintaan->status_sarjana == '1' ? 'checked' : '' }}>
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Syarat Pendidikan Khusus</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="syarat_pendidikan_khusus" id="syarat_pendidikan_khusus" value="{{$permintaan->syarat_pendidikan_khusus}}" readonly="">
            </div>
            <label for="expired" class="col-sm-2 col-form-label">Syarat Lain (misal: SIM)</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="syarat_lain" id="syarat_lain" value="{{$permintaan->syarat_lain}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="alasan_cocok" class="col-sm-2 col-form-label">Apakah ada yang cocok? apa alasannya?</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alasan_cocok" id="alasan_cocok" value="{{$permintaan->alasan_cocok}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Diminta Oleh</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="diminta_oleh" id="diminta_oleh" value="{{$permintaan->diminta_oleh}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="expired" class="col-sm-2 col-form-label">Diketahui Oleh (Manajer SDM & Umum)</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="diketahui_oleh" id="diketahui_oleh" value="{{$permintaan->diketahui_oleh}}" readonly="">
            </div>
            <label for="expired" class="col-sm-2 col-form-label">Disetujui Oleh (Direksi)</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="disetujui_oleh" id="disetujui_oleh" value="{{$permintaan->disetujui_oleh}}" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <label for="catatan" class="col-sm-2 col-form-label">Catatan Manager SDM & Umum</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="catatan" id="catatan" value="{{$permintaan->catatan}}" readonly="">
            </div>
          </div>
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
  });
</script>
@endsection


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
    <h2> Laporan dan Penilaian Pegawai </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Atasan</a>
      </li>
      <li>
        <a>Penilaian Pegawai</a>
      </li>
      <li class="active">
        <strong> Laporan dan Penilaian Pegawai </strong>
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
  <form id="form-pekerja" data-parsley-validate="" method="POST" action="{{url('store_penilaian_pegawai')}}/{{$data_karyawan->id}}" enctype="multipart/form-data">
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
        <div class="contact-box">
          <div class="col-sm-6">
            <div class="form-group row">
              <label for="expired" class="col-sm-4 col-form-label">Nama</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$data_karyawan->nama}}" readonly="">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-4 col-form-label">Nomor Pegawai</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$data_karyawan->id}}" readonly="">
              </div>
            </div>
            <div class="form-group row">
              <label for="expired" class="col-sm-4 col-form-label">Periode</label>
              <div class="col-sm-8">
                <select data-placeholder="Pilih Periode" name="periode" id="periode" class="form-control select2" required="">
                  <option value="">--Pilih Periode--</option>
                  @foreach($periode as $value)
                  <option value="{{$value->id_periode_nilai}}">{{$value->s_bulan}}-{{$value->e_bulan}} {{$value->tahun}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="2" class="text-center">TINGKAT PENILAIAN</th>
                </tr>
                <tr>
                  <th class="text-center">KUANTITATIF</th>
                  <th class="text-center">KETERANGAN</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">4<br>3<br>2<br>1</td>
                  <td>A = Sangat Kompeten<br>B = Kompeten<br>C = Cukup<br>D = Buruk</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Laporan dan Penilaian Pegawai</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">I. DISIPLIN</label>
                <p>Sikap mental yang harus dimiliki oleh seseorang untuk mematuhi peraturan dan ketentuan yang berlaku di perusahaan dengan tertib</p>
              </div>
              <div class="col-sm-4">
                <div class="radio radio-primary"> <input type="radio" class="radio-primary" name="nilai_disiplin" id="nilai_disiplin" value="Mangkir" required=""><label for="jk" style="cursor: pointer;">Mangkir</label></div>
                <div class="radio radio-primary"> <input type="radio" class="radio-primary" name="nilai_disiplin" id="nilai_disiplin" value="Datang Telat"  required=""><label for="jk2" style="cursor: pointer;">Datang Telat</label></div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">II. TANGGUNG JAWAB</label>
                <p>Sikap mental seseorang dalam menyelesaikan tugas yang diserahkan kepadanya dengan hasil sebaik-baiknya serta berani mempertanggungjawabkan</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_tanggung_jawab" id="nilai_tanggung_jawab" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">III. KEJUJURAN</label>
                <p>Sikap mental seseorang dalam berlaku jujur, baik yang bersifat materil (benda, uang) maupun yang non materiil (pernyataan, pendapat, dan sebagainya)</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_kejujuran" id="nilai_kejujuran" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">IV. LOYALITAS</label>
                <p>Sikap mental seseorang dalam pengabdiannya kepada perusahaan dan atasan</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_loyalitas" id="nilai_loyalitas" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">V. INISIATIF & KREATIVITAS</label>
                <p>Kemampuan seseorang dalam mengambil prakarsa dan menciptakan hal-hal baru</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_inisiatif_kreativitas" id="nilai_inisiatif_kreativitas" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">VI. KECAKAPAN / KETERAMPILAN</label>
                <p>Kemampuan seseorang dalam menyelesaikan tugas dengan sebaik-baiknya yang berkaitan dengan waktu, mutu, biaya dan volume pekerjaan</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_kecakapan_keterampilan" id="nilai_kecakapan_keterampilan" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">VII. HUBUNGAN & KERJASAMA</label>
                <p>Kemampuan seseorang dalam bergaul dan bekerja sama secara efektif dan harmonis serta memperhatikan etika pergaulan dengan pihak-pihak yang bersangkutan</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_hubungan_kerjasama" id="nilai_hubungan_kerjasama" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">VIII. PENGAMANAN LINGKUNGAN</label>
                <p>Peran serta pegawai terhadap keamanan, ketertiban, dan kebersihan peralatan, data, lingkungan kerja maupun keamanan bagi SDM yang ada di tempat kerja</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_pengamanan_lingkungan" id="nilai_pengamanan_lingkungan" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="expired" class="col-form-label">IX. KEPEMIMPINAN</label>
                <p>Kemampuan pegawai dalam memimpin, memberikan keteladanan dan melakukan yang menjadi tanggung jawabnya</p>
              </div>
              <div class="col-sm-4">
                <select data-placeholder="Pilih Nilai" name="nilai_kepemimpinan" id="nilai_kepemimpinan" class="form-control select2" required="">
                  <option value="">--Pilih Nilai--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="expired" class="col-form-label">X. PENILAIAN SPESIFIKASI JABATAN</label>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">ITEM SPESIFIKASI</th>
                      <th class="text-center">PERSYARATAN SPESIFIKASI</th>
                      <th class="text-center">PENILAIAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1. PENDIDIKAN</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pendidikan" placeholder="Spesifikasi Pendidikan" required=""></td>
                      <td>
                        <select data-placeholder="Pilih Nilai" name="nilai_spesifikasi_pendidikan" id="nilai_spesifikasi_pendidikan" class="form-control select2" style="width: 100%" required="">
                          <option value="">--Pilih Nilai--</option>
                          <option value="Sangat Sesuai">Sangat Sesuai</option>
                          <option value="Sesuai">Sesuai</option>
                          <option value="Kurang Sesuai">Kurang Sesuai</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>2. PENGALAMAN</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pengalaman" placeholder="Spesifikasi Pengalaman" required=""></td>
                      <td>
                        <select data-placeholder="Pilih Nilai" name="nilai_spesifikasi_pengalaman" id="nilai_spesifikasi_pengalaman" class="form-control select2" style="width: 100%" required="">
                          <option value="">--Pilih Nilai--</option>
                          <option value="Sangat Sesuai">Sangat Sesuai</option>
                          <option value="Sesuai">Sesuai</option>
                          <option value="Kurang Sesuai">Kurang Sesuai</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>3. PELATIHAN</td>
                      <td><input type="text" class="form-control" name="spesifikasi_pelatihan" placeholder="Spesifikasi Pelatihan" required=""></td>
                      <td>
                        <select data-placeholder="Pilih Nilai" name="nilai_spesifikasi_pelatihan" id="nilai_spesifikasi_pelatihan" class="form-control select2" style="width: 100%" required="">
                          <option value="">--Pilih Nilai--</option>
                          <option value="Sangat Sesuai">Sangat Sesuai</option>
                          <option value="Sesuai">Sesuai</option>
                          <option value="Kurang Sesuai">Kurang Sesuai</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>4. KETRAMPILAN</td>
                      <td><input type="text" class="form-control" name="spesifikasi_keterampilan" placeholder="Spesifikasi Keterampilan" required=""></td>
                      <td>
                        <select data-placeholder="Pilih Nilai" name="nilai_spesifikasi_keterampilan" id="nilai_spesifikasi_keterampilan" class="form-control select2" style="width: 100%" required="">
                          <option value="">--Pilih Nilai--</option>
                          <option value="Sangat Sesuai">Sangat Sesuai</option>
                          <option value="Sesuai">Sesuai</option>
                          <option value="Kurang Sesuai">Kurang Sesuai</option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                <label for="expired" class="col-form-label">Kesimpulan/Saran (Bila ada, seperti Usulan Pelatihan atau lainnya</label>
              </div>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kesimpulan_saran" placeholder="Kesimpulan/Saran">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                <label for="expired" class="col-form-label">Catatan Personalia</label>
              </div>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="catatan_personalia" placeholder="Catatan Personalia">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row">
              <div class="col-sm-4 col-sm-offset-9">
                <a href="{{url('penilaian_datakaryawan')}}" class="btn btn-danger btn-flat" type="button">Kembali</a>
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


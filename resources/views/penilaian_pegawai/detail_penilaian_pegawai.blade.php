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
    <h2> Detail Penilaian Pegawai </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Hubnaker</a>
      </li>
      <li>
        <a>Histori Penilaian Pegawai</a>
      </li>
      <li class="active">
        <strong> Detail Penilaian Pegawai </strong>
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
              @csrf
              <select data-placeholder="Pilih Periode" name="periode" id="periode" class="form-control chosen-select select-tapel">
                <option value="">--Pilih Periode--</option>
                @foreach($periode as $value)
                <option value="{{$value->id_periode_nilai}}">{{$value->s_bulan}}-{{$value->e_bulan}} {{$value->tahun}}</option>
                @endforeach
              </select>
              <span class="input-group-append">
                <button type="button" class="btn btn-success" id="btn-ganti">Ganti</button>
              </span>
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
          <h5>Detail Penilaian Pegawai</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content" id="detail-nilai">
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">I. DISIPLIN</label>
              <p>Sikap mental yang harus dimiliki oleh seseorang untuk mematuhi peraturan dan ketentuan yang berlaku di perusahaan dengan tertib</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_disiplin" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">II. TANGGUNG JAWAB</label>
              <p>Sikap mental seseorang dalam menyelesaikan tugas yang diserahkan kepadanya dengan hasil sebaik-baiknya serta berani mempertanggungjawabkan</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_tanggung_jawab" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">III. KEJUJURAN</label>
              <p>Sikap mental seseorang dalam berlaku jujur, baik yang bersifat materil (benda, uang) maupun yang non materiil (pernyataan, pendapat, dan sebagainya)</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_kejujuran" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">IV. LOYALITAS</label>
              <p>Sikap mental seseorang dalam pengabdiannya kepada perusahaan dan atasan</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_loyalitas" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">V. INISIATIF & KREATIVITAS</label>
              <p>Kemampuan seseorang dalam mengambil prakarsa dan menciptakan hal-hal baru</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_inisiatif_kreativitas" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">VI. KECAKAPAN / KETERAMPILAN</label>
              <p>Kemampuan seseorang dalam menyelesaikan tugas dengan sebaik-baiknya yang berkaitan dengan waktu, mutu, biaya dan volume pekerjaan</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_kecakapan_keterampilan" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">VII. HUBUNGAN & KERJASAMA</label>
              <p>Kemampuan seseorang dalam bergaul dan bekerja sama secara efektif dan harmonis serta memperhatikan etika pergaulan dengan pihak-pihak yang bersangkutan</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_hubungan_kerjasama" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">VIII. PENGAMANAN LINGKUNGAN</label>
              <p>Peran serta pegawai terhadap keamanan, ketertiban, dan kebersihan peralatan, data, lingkungan kerja maupun keamanan bagi SDM yang ada di tempat kerja</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_pengamanan_lingkungan" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="expired" class="col-form-label">IX. KEPEMIMPINAN</label>
              <p>Kemampuan pegawai dalam memimpin, memberikan keteladanan dan melakukan yang menjadi tanggung jawabnya</p>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nilai_kepemimpinan" readonly="">
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
                    <td><input type="text" class="form-control" id="spesifikasi_pendidikan" readonly=""></td>
                    <td>
                      <input type="text" class="form-control" id="nilai_spesifikasi_pendidikan" readonly="">
                    </td>
                  </tr>
                  <tr>
                    <td>2. PENGALAMAN</td>
                    <td><input type="text" class="form-control" id="spesifikasi_pengalaman" readonly=""></td>
                    <td>
                      <input type="text" class="form-control" id="nilai_spesifikasi_pengalaman" readonly="">
                    </td>
                  </tr>
                  <tr>
                    <td>3. PELATIHAN</td>
                    <td><input type="text" class="form-control" id="spesifikasi_pelatihan" readonly=""></td>
                    <td>
                      <input type="text" class="form-control" id="nilai_spesifikasi_pelatihan" readonly="">
                    </td>
                  </tr>
                  <tr>
                    <td>4. KETRAMPILAN</td>
                    <td><input type="text" class="form-control" id="spesifikasi_keterampilan" readonly=""></td>
                    <td>
                      <input type="text" class="form-control" id="nilai_spesifikasi_keterampilan" readonly="">
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
              <input type="text" class="form-control" id="kesimpulan_saran" readonly="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">
              <label for="expired" class="col-form-label">Catatan Personalia</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="catatan_personalia" readonly="">
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
   $('.chosen-select').chosen({
    no_results_text: "Oops, nothing found!"
  });

   var _token = $('input[name="_token"]').val();

   var id_karyawan = '{{ $data_karyawan->id }}';
   var id_periode = '';

   $('#btn-ganti').click(function () {
    id_periode = $('.select-tapel').val();
    console.log(id_periode);

    $.ajax({
      url: '{{ url("pegawai/datanilai") }}',
      type: 'POST',
      data: {id_karyawan: id_karyawan, id_periode: id_periode, _token: _token},
      success: function (data) {
        $.each(data, function (index, element) {
          console.log(element.nilai_disiplin);
          $('#nilai_disiplin').val(element.nilai_disiplin).val();
          $('#nilai_tanggung_jawab').val(element.nilai_tanggung_jawab);
          $('#nilai_kejujuran').val(element.nilai_kejujuran);
          $('#nilai_loyalitas').val(element.nilai_loyalitas);
          $('#nilai_inisiatif_kreativitas').val(element.nilai_inisiatif_kreativitas);
          $('#nilai_kecakapan_keterampilan').val(element.nilai_kecakapan_keterampilan);
          $('#nilai_hubungan_kerjasama').val(element.nilai_hubungan_kerjasama);
          $('#nilai_pengamanan_lingkungan').val(element.nilai_pengamanan_lingkungan);
          $('#nilai_kepemimpinan').val(element.nilai_kepemimpinan);
          $('#spesifikasi_pendidikan').val(element.spesifikasi_pendidikan);
          $('#spesifikasi_pengalaman').val(element.spesifikasi_pengalaman);
          $('#spesifikasi_pelatihan').val(element.spesifikasi_pelatihan);
          $('#spesifikasi_keterampilan').val(element.spesifikasi_keterampilan);
          $('#kesimpulan_saran').val(element.kesimpulan_saran);
          $('#catatan_personalia').val(element.catatan_personalia);
          $('#nilai_spesifikasi_pendidikan').val(element.nilai_spesifikasi_pendidikan);
          $('#nilai_spesifikasi_keterampilan').val(element.nilai_spesifikasi_keterampilan);
          $('#nilai_spesifikasi_pengalaman').val(element.nilai_spesifikasi_pengalaman);
          $('#nilai_spesifikasi_pelatihan').val(element.nilai_spesifikasi_pelatihan);
        })
      }
    });

  });
 });
</script>
@endsection


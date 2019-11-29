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
        <h2>Request Pekerjaan</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('home')}}">Dashboard</a>
            </li>
            <li>Pegawai</li>
            <li class="active">Request Pekerjaan</li>
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
                    <h5>Form Tambah Data Request Pekerjaan</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">


             <form id="form-pekerja" data-parsley-validate="">
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Nomor Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Nomor PK / SP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Nama Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Periode Pekerjaan Awal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Periode Pekerjaan Akhir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Jumlah Tenaga Kerja / Kendaraan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Status Tenaga Kerja</label>
                            <div class="col-sm-9">
                                 <select class="form-control chosen-select-width5" name="jenis_kelamin_keluarga[]">
                                    <option value="" selected disabled>-- status tenaga kerja</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">unit</label>
                            <div class="col-sm-9">
                                 <select class="form-control chosen-select-width5" name="jenis_kelamin_keluarga[]">
                                    <option value="" selected disabled>-- unit --</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Lokasi Kerja / Tempat Pengiriman</label>
                            <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Jumlah Hari Kerja / Delivery Order</label>
                            <div class="col-sm-2">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                            <label for="nik" class="col-sm-7 col-form-label">Hari kerja dalam seminggu sesuai schedule</label>
                        </div>
                        <div class="form-group row">
                            <h4 style="color: brown">Hak-hak yang diterima Tenaga kerja :</h4>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Gaji Bulanan</label>
                            <div class="col-sm-9">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Tunjangan Keahlian / Kordinator</label>
                            <div class="col-sm-9">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Uang Makan / per hari</label>
                            <div class="col-sm-9">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Uang Transport / per hari</label>
                            <div class="col-sm-9">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Tunjangan Premi Shift / kendaraan</label>
                            <div class="col-sm-9">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-3 col-form-label">Jumlah Jam Lembur / Tunjangan Lembur</label>
                            <div class="col-sm-2">
                                  <input type="number" class="form-control" name="nama" id="nik"  required="">
                            </div>
                            <label for="nik" class="col-sm-1 col-form-label">Ket</label>
                            <div class="col-sm-6">
                                  <input type="text" class="form-control" name="nama" id="nik"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h4 style="color: brown">Kelengkapan APD tiap tenaga kerja :</h4>
                        </div>
                        <div class="form-group row">
                            <table class="table tabel_pendidikan table-bordered table-striped" >
                                <thead >
                                  <th style="text-align: center;" class="warna" width="50%">Nama Perlengkapan</th>
                                  <th style="text-align: center;" class="warna" width="20%">Kebutuhan Selama 5 Bulan</th>
                                  <th style="text-align: center;" class="warna" width="20%">Satuan</th>
                                  <th style="text-align: center;" class="warna" width="10%"></th>
                                </thead>
                                <tbody class="clone_susunan_keluarga">
                                  <tr>
                                    <td align="center">
                                      <select class="form-control chosen-select-width5" id="nama_barang">
                                        <option value="" selected disabled>-- unit --</option>
                                        <option value="sepatu">Sepatu</option>
                                        <option value="helm">Helm</option>
                                      </select>
                                    </td>
                                    <td align="center">
                                        <input type="number" class="form-control" name="nama" id="jumlah"  required="">
                                    </td>
                                    <td align="center" class="clone_append" width="">
                                      <select class="form-control chosen-select-width5" id="satuan">
                                        <option value="" selected disabled>-- unit --</option>
                                        <option value="kg">kg</option>
                                        <option value="gr">gr</option>
                                      </select>
                                    </td>
                                    <td align="center">
                                      <a class="btn btn-default" onclick="tambah()">Tambah</a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="table-responsive" style="margin-top: 1px;">
                                    <table class="table table-striped table-bordered table-hover" id="tabelitem">
                                        <thead>
                                            <tr>
                                                <th style="width: 50%;">Nama Perlengkapan</th>
                                                <th style="width: 20%;">Kebutuhan Selama 5 Bulan</th>
                                                <th style="width: 20%;">Satuan</th>
                                                <th style="width: 10%;">Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
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
<script>
var tablepembelian;
 $( document ).ready(function() {
    tablepembelian = $("#tabelitem").DataTable({
        responsive: true,
        paging: false,
        searching: false
    });

});

 function tambah(){
    var nama_barang = $("#nama_barang option:selected").text();
    var jumlah = $('#jumlah').val();
    var satuan = $('#satuan').val();
    tablepembelian.row.add( [
            '<input type="hidden" name="id_apd[]" id="id_apd[]" /> '+nama_barang+'',
            '<input type="hidden" name="jml_kebutuhan[]" id="jml_kebutuhan[]" /> '+jumlah+'',
            '<input type="hidden" name="satuan[]" id="satuan[]" /> '+satuan+'',
            buttonGen()
        ] ).draw( false );

    $(".btnhapus").click(function(){
        tablepembelian
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    });

 }


 function buttonGen(){
        var buton = '<div class="text-center"><button style="margin-left:5px;" type="button" class="btn btn-danger btn-xs btnhapus" ><i class="glyphicon glyphicon-trash"></i></button></div>'
        return buton;
    }

</script>
@endsection


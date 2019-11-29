@extends('main')

@section('title', 'dashboard')

@section('extra_styles')

<style>th.dt-center, td.dt-center { text-align: center; }</style>

@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2> Detail Pelamar </h2>
    <ol class="breadcrumb">
      <li>
        <a>Home</a>
      </li>
      <li>
        <a>Kepegawaian</a>
      </li>
      <li>
        <a>Proses Seleksi Rekrutmen</a>
      </li>
      <li class="active">
        <strong> Detail Pelamar </strong>
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
                <!-- <div class="ibox-title">
                  <div class="text-right">
                      <button class="btn btn-info btn-md btn-flat text-right" type="button" data-toggle="modal" data-target="#insert">Tambah Komponen Gaji</button>
                  </div>
                </div> -->
                <div class="ibox-content p-xl">
                  <div class="row">


                    <div class="col-sm-12">
                      <div class="tabs-container">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#tab-1">Detail Pelamar</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-2">Pendidikan Formal</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-3">Pendidikan Non Formal</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-4">Data Keluarga</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-5">Susunan Keluarga</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-6">Pengalaman Kerja</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-7">Pengalaman Organisasi</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                              <h3><i class="fa fa-user-circle"></i> Detail Pelamar</h3>
                              <div class="hr-line-dashed"></div>
                              <div class="col-lg-12">
                                <dt>Nama:</dt> <dd>{{$jobseeker->nama_lengkap}}</dd><br>
                                <dt>Tempat/Tanggal Lahir:</dt> <dd>{{$jobseeker->tempat_lahir}} / {{ date('d F Y', strtotime($jobseeker->tanggal_lahir)) }}</dd><br>
                                <dt>Jenis Kelamin:</dt> <dd>{{$jobseeker->jenis_kelamin}}</dd><br>
                                <dt>Agama:</dt> <dd>{{$jobseeker->agama}}</dd><br>
                                <dt>Alamat:</dt> <dd>{{$jobseeker->alamat_ktp}}</dd><br>
                                <dt>No. HP:</dt> <dd>{{$jobseeker->nohp}}</dd><br>
                                <dt>Alasan Melamar:</dt> <dd>{{$jobseeker->alasan_melamar}}</dd><br>
                                <dt>Kesanggupan Sift/Alasan:</dt> <dd>{{$jobseeker->radio_bersedia_sift}} / {{$jobseeker->alasan_sift}}</dd><br>
                                <dt>Kesanggupan Mutasi/Alasan:</dt> <dd>{{$jobseeker->radio_bersedia_mutasi}} / {{$jobseeker->alasan_mutasi}}</dd><br>
                              </div>
                            </div>
                          </div>
                          <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-send"></i> Riwayat Pendidikan Formal </h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Nama Sekolah</th>
                                    <th>Kota</th>
                                    <th>Jurusan</th>
                                    <th>Lulus</th>
                                    <th>Tahun Lulus</th>
                                    <th>Kelas Terakhir</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  @foreach($pendidikan_formal as $value)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$value->tingkat_pendidikan}}</td>
                                    <td>{{$value->nama_sekolah}}</td>
                                    <td>{{$value->id_kabkota}}</td>
                                    <td>{{$value->jurusan}}</td>
                                    <td>{{$value->keterangan}}</td>
                                    <td>{{$value->tahun_lulus}}</td>
                                    <td>{{$value->kelas_terakhir}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-book"></i> Riwayat Pendidikan Non Formal</h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama & Jenis Kursus</th>
                                    <th>Nama Lembaga Pendidikan</th>
                                    <th>Lama Pendidikan</th>
                                    <th>Tahun Lulus</th>
                                    <th>Kota</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                @foreach($pendidikan_informal as $value)
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{$value->nama_kursus}}</td>
                                  <td>{{$value->nama_lembaga}}</td>
                                  <td>{{$value->lama_pendidikan}}</td>
                                  <td>{{$value->tahun_lulus}}</td>
                                  <td>{{$value->id_kabkota}}</td>
                                </tr>
                                @endforeach
                              </table>
                            </div>
                          </div>
                          <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-send"></i> Data Keluarga </h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Anggota Keluarga</th>
                                    <th>Hubungan Keluarga</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Bekerja</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  @foreach($data_keluarga as $value)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$value->nama_anggota_keluarga}}</td>
                                    <td>{{$value->hubungan_keluarga}}</td>
                                    <td>{{$value->jenis_kelamin}}</td>
                                    <td>{{$value->tempat_lahir}}</td>
                                    <td>{{ date('d F Y', strtotime($value->tanggal_lahir)) }}}</td>
                                    <td>{{$value->bekerja}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="tab-5" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-send"></i> Susunan Keluarga </h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Keanggotaan</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Perusahaan</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  @foreach($susunan_keluarga as $value)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$value->keanggotaan}}</td>
                                    <td>{{$value->nama_anggota_keluarga}}</td>
                                    <td>{{$value->jenis_kelamin}}</td>
                                    <td>{{$value->usia}}</td>
                                    <td>{{$value->pendidikan}}</td>
                                    <td>{{$value->pekerjaan}}</td>
                                    <td>{{$value->perusahaan}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="tab-6" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-send"></i> Pengalaman Kerja </h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Jabatan</th>
                                    <th>Alasan Pindah/Masih Bekerja</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  @foreach($kerja as $value)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$value->nama_perusahaan}}</td>
                                    <td>{{$value->alamat_perusahaan}}</td>
                                    <td>{{$value->jabatan}}</td>
                                    <td>{{$value->alasan_pindah}}</td>
                                    <td>{{$value->bulan_masuk}} {{$value->tahun_masuk}}</td>
                                    <td>{{$value->bulan_keluar}} {{$value->tahun_keluar}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="tab-7" class="tab-pane">
                            <div class="panel-body">
                              <h3><i class="fa fa-send"></i> Pengalaman Organisasi </h3>
                              <div class="hr-line-dashed"></div>
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Organisasi</th>
                                    <th>Jenis Organisasi</th>
                                    <th>Tahun</th>
                                    <th>Jabatan</th>
                                  </tr>
                                </thead>
                                <?php $i=1; ?>
                                <tbody>
                                  @foreach($organisasi as $value)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$value->organisasi}}</td>
                                    <td>{{$value->jenis_organisasi}}</td>
                                    <td>{{$value->tahun}}</td>
                                    <td>{{$value->jabatan}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row" style="padding-bottom: 50px;"></div>

        @endsection



        @section('extra_scripts')
        <script type="text/javascript">
          $(document).ready(function() {

            $('[data-toggle="tooltip"]').tooltip();

            $('#addColumn1').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": false,
              "responsive": true,
              "autoWidth": false,
              "pageLength": 10,
              "retrieve" : true,
            });

            $('.date').datepicker({
              autoclose: true,
              todayHighlight: true,
              format: 'yyyy-mm-dd'
            });

          });

        </script>
        @endsection


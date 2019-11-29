<div id="pendidikan"  class="tab-content my-resume">
  <div class="inner-box">
    <div class="item">
      <h3>Pendidikan</h3>
    </div>
    <div class="inner-box" >
      <div class="item">
        <!--pendidikan formal-->
        <div class="row">
        <div class="col-12">
        <div class="table-responsive">
        <h4>Pendidikan Formal</h4>
          <table id="pendidikan-formal-table" class="table table-bordered" style="border-radius:25px;">
              <tr class="thead-smi th-center">
                <th  width="7%"><h4>Tingkatan</h4></th>
                <th  width="10%" ><h4>Tahun Sekolah</h4></th>
                <th  width="30%"><h4>Nama Institusi</h4></th>
                <th><h4>Tempat</h4></th>
                <th><h4>Jurusan</h4></th>
                <th width="7%"><h4><small>IPK/Nilai Akhir</small></h4></th>
                <th width="10%"><h4>Keterangan</h4></th>
                <th width="10%"><h4>Option</h4></th>
            </tr>
            @foreach ($dataUserSt['PendidikanFormal'] as $key => $item)
            <tr>
                <th data-value="{{$item->tingkat_pendidikan}}"><h4>{{$item->st_tingkatpendidikan->strata}}</h4></th>
                <th data-tanggalmulai="{{date("Y",strtotime($item->tanggal_mulai))}}" data-tanggalakhir="{{date("Y",strtotime($item->tanggal_akhir))}}"><h4>{{date("Y",strtotime($item->tanggal_mulai))." - ".date("Y",strtotime($item->tanggal_akhir))}}</h4></th>
                <th><h4>{{$item->institusi}}</h4></th>
                <th><h4>{{$item->tempat}}</h4></th>
                <th><h4>{{$item->jurusan}}</h4></th>
                <th><h4>{{$item->IPK}}</h4></th>
                <th><h4>{{$item->keterangan}}</h4></th>
                <th><h4>
                    <button data-toggle="modal"  data-target=".pendidikanformal-modal"  data-id="{{$item->id}}" class="btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                    <button data-toggle="modal"  data-target="#deletemodal"  data-id="{{$item->id}}" data-href="datadiri/deletependidikanformal/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                  </h4>
                </th>
            </tr>
            @endforeach
        </table>
        <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target=".pendidikanformal-modal">
          <i class="fa fa-plus"></i>
        Tambah</button>  
        <br>
        </div>
        <!--modal pendidikan formal-->
        <form>
            <div id="pendidikanformal" class="modal fade pendidikanformal-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-head">
                      <h3 class="modal-title ml-4 mt-3">Data Pendidikan Formal</h3>
                  </div>
                  <div class="modal-body">
                    <div class="inner-box" >
                        <div class="item">
                          <input type="hidden" class="form-control" id="id" placeholder="Masukan Tahun Mulai">
                          <div class="form-group">
                                <h4><label class="my-1 mr-2" for="TingkatPendidikan">Tingkat Pendidikan</label></h4>
                                <select class="custom-select my-1 mr-sm-2" id="TingkatPendidikan">
                                  <option selected value="">Pilih . . .</option>
                                  @foreach ($st_data["TingkatPendidikan"] as $item)
                                    <option value="{{$item->id}}">{{$item->strata}}</option>    
                                  @endforeach
                                </select>
                          </div>
                        <div class="form-group input-date-range">
                            <h4>Tahun</h4>
                            <label for="tahunmulai">Mulai</label>
                            <input type="text" class="form-control typeTahun" id="tahunmulai" placeholder="Masukan Tahun Mulai">
                            <div id="DatePendidikanFormalMulai">
                            </div>
                            <label for="tahunakhir">Akhir</label>
                            <input type="text" class="form-control typeTahun" id="tahunakhir" placeholder="Masukan Tahun Akhir">
                            <div id="DatePendidikanFormalAkhir">
                              </div>
                        </div>
                        <div class="form-group">
                              <h4><label for="institusi">Institusi</label></h4>
                              <input type="text" class="form-control" id="institusi" placeholder="Masukan nama Institusi">
                         </div>
                         <div class="form-group">
                              <h4><label for="tempat">Tempat</label></h4>
                              <input type="text" class="form-control" id="tempat" placeholder="Masukan tempat institusi">
                         </div>
                         <div class="form-group">
                              <h4><label for="jurusan">Jurusan</label></h4>
                              <input type="text" class="form-control" id="jurusan" placeholder="Masukan nama jurusan">
                         </div>
                         <div class="form-group">
                              <h4><label for="IPK">IPK / Nilai Akhir</label></h4>
                              <input type="number" min="0" max="100" step="0.01" class="form-control" id="IPK" placeholder="Masukan Nilai Akhir">
                          </div>
                          <div class="form-group">
                               <h4><label for="keterangan">Keterangan</label></h4>
                               <textarea class="form-control" id="keterangan"></textarea>
                          </div>
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="submitPendidikanFormal">Simpan
                          <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                      </button>
                  </div>

                </div>
              </div>
            </div>
          </form>
      </div>
      <!--modal pendidikan formal end-->
      <!--pendidikan formal end-->
      <!--pendidikan informal -->
      <div class="col-12">
      <h4>Pendidikan Informal / Pelatihan Kursus</h4>
      <div class="table-responsive">
      <table class="table table-bordered" id="pendidikan-informal-table" style="border-radius:25px;">
          <tr class="thead-smi th-center">
              <th><h4>Jenis Pelatihan</h4></th>
              <th><h4>Periode</h4></th>
              <th><h4>Tempat</h4></th>
              <th><h4>Keterangan</h4></th>
              <th width="10%"><h4>Option</h4></th>
          </tr>
          @foreach ($dataUserSt['PendidikanInformal'] as $key => $item)
          <tr>
              <th><h4>{{$item->jenis_pelatihan}}</h4></th>
              <th data-tanggalmulai="{{date("Y",strtotime($item->tanggal_mulai))}}" data-tanggalakhir="{{date("Y",strtotime($item->tanggal_akhir))}}"><h4>{{date("Y",strtotime($item->tanggal_mulai))." - ".date("Y",strtotime($item->tanggal_akhir))}}</h4></th>
              <th><h4>{{$item->tempat}}</h4></th>
              <th><h4>{{$item->keterangan}}</h4></th>
              <th><h4>
              <button data-toggle="modal" data-target=".pendidikaninformal-modal" data-id="{{$item->id}}"  class="btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
              <button data-toggle="modal" data-target="#deletemodal"  data-id="{{$item->id}}" data-href="datadiri/deletependidikaninformal/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
              </h4></th>
              </tr>
          @endforeach
        </table>
        <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target=".pendidikaninformal-modal">
          <i class="fa fa-plus"></i>
        Tambah</button>
        </div>
          <!--modal pendidikan formal-->
          <br>
          <form>
              <div id="pendidikaninformal" class="modal fade pendidikaninformal-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-head">
                        <h3 class="modal-title ml-4 mt-3">Data Pendidikan Informal / Pelatihan Kursus</h3>
                    </div>
                    <div class="modal-body">
                      <div class="inner-box">
                          <div class="item">
                          <input type="hidden" class="form-control" id="id">
                          <div class="form-group">
                              <h4><label for="tempat">Jenis Pelatihan</label></h4>
                              <input type="text" class="form-control" id="jenispelatihan" placeholder="Masukan jenis pelatihan">
                          </div>
                          <div class="form-group">
                              <h4>Periode</h4>
                              <label for="tahunmulai">Mulai</label>
                              <input type="text"  class="form-control typeTahun" id="tahunmulai" placeholder="Masukan Tahun Mulai">
                              <div id="DatePendidikanInformalMulai">
                              </div>
                              <label for="tahunakhir">Akhir</label>
                              <input type="text"  class="form-control typeTahun" id="tahunakhir" placeholder="Masukan Tahun Akhir">
                              <div id="DatePendidikanInformalAkhir">
                              </div>
                          </div>
                            <div class="form-group">
                                <h4><label for="tempat">Tempat</label></h4>
                                <input type="text" class="form-control" id="tempat" placeholder="Masukan tempat lembaga">
                            </div>
                            <div class="form-group">
                                <h4><label for="keterangan">Keterangan</label></h4>
                                <textarea class="form-control" rows="3"  id="keterangan"></textarea>
                            </div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary"  id="submitPendidikanInformal">Simpan
                        <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;"><button>
                    </div>

                  </div>
                </div>
              </div>
            </form>
        </div>
        </div>
        <!--modal pendidikan informal end-->
        <!--pendidikan informal end-->

            <!--kemampuan bahasa asing-->
            <div class="col-12">
            <h4>Kemampuan Bahasa Asing</h4>
            <div class="table-responsive">
            <table class="table table-bordered" id="pendidikan-bahasa-table" style="border-radius:20px;">
                <tr class="thead-smi th-center">
                    <th><h4>Bahasa</h4></th>
                    <th><h4>Lisan</h4></th>
                    <th><h4>Tertulis</h4></th>
                    <th width="15%"><h4>Option</h4></th>
                </tr>
                @foreach ($dataUserSt['PendidikanBahasa'] as $key=>$item)
                    <tr>
                          <th data-value="{{$item->bahasa}}"><h4>{{$item->st_bahasa->deskripsi}}</h4></th>
                          <th data-value="{{$item->kemampuan_lisan}}"><h4>{{$item->st_kemampuanlisan->tingkat}}</h4></th>
                          <th data-value="{{$item->kemampuan_tertulis}}"><h4>{{$item->st_kemampuantertulis->tingkat}}</h4></th>
                          <th><h4>
                              <button data-toggle="modal"  data-target=".pendidikanbahasa-modal" data-id="{{$item->id}}" class="mx-auto btn-outline-primary rounded"><i class="fa fa-edit fa-1x"></i></button>
                              <button data-toggle="modal"  data-target="#deletemodal"  data-id="{{$item->id}}" data-href="datadiri/deletependidikanbahasa/"  class="btn-outline-danger rounded"><i class="fa fa-trash fa-1x"></i></button>
                          </h4></th>
                    </tr>
                @endforeach
              </table>
              <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target=".pendidikanbahasa-modal">
                <i class="fa fa-plus"></i>
              Tambah</button>
            </div>
          <!--modal kemampuan bahasa asing-->
          <br>
          <form>
              <div id="pendidikanbahasa" class="modal fade pendidikanbahasa-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-head">
                        <h3 class="modal-title ml-4 mt-3">Data Kemampuan Bahasa Asing</h3>
                    </div>
                    <div class="modal-body">
                      <div class="inner-box">
                          <div class="item">
                              <input type="hidden" class="form-control" id="id">
                              <div class="form-group">
                                  <h4><label class="my-1 mr-2" for="bahasa">Bahasa</label></h4>
                                  <select class="custom-select my-1 mr-sm-2" id="bahasa">
                                    <option selected value="">Pilih . . .</option>
                                    @foreach ($st_data["Bahasa"] as $item)
                                      <option value="{{$item->id}}">{{$item->deskripsi}}</option>    
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                  <h4><label class="my-1 mr-2" for="kemampuanlisan">Kemampuan Lisan</label></h4>
                                  <select class="custom-select my-1 mr-sm-2" id="kemampuanlisan">
                                    <option selected value="">Pilih . . .</option>
                                    @foreach ($st_data["Kemampuan"] as $item)
                                      <option value="{{$item->id}}">{{$item->tingkat}}</option>    
                                    @endforeach
                                  </select>
                            </div>
                            <div class="form-group">
                                <h4><label class="my-1 mr-2" for="kemampuantertulis">Kemampuan Tertulis</label></h4>
                                <select class="custom-select my-1 mr-sm-2" id="kemampuantertulis">
                                    <option selected value="">Pilih . . . </option>
                                    @foreach ($st_data["Kemampuan"] as $item)
                                      <option value="{{$item->id}}">{{$item->tingkat}}</option>    
                                    @endforeach
                                </select>
                            </div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="submitPendidikanBahasa">Simpan
                        <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;"><button>
                    </div>

                  </div>
                </div>
              </div>
            </form>
          </div>
        <!--modal kamampuan bahasa asing end-->
        <!--kemampuan bahasa asing end-->
            </div>
          </div>
  </div>
  <script>
  </script>
</div>

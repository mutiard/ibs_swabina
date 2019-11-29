<div id="identitas" class="tab-content my-resume">
  <div class="inner-box">
      <!--identitas-->
      <div class="item">
          <h3>Identitas</h3>
      </div>
      <form class="form-identitas">
          <div class="inner-box" style="overflow:auto; height:90vh; overflow-y:scroll;">
              <div class="item">
                  <div class="form-group">
                      <h4><label for="NIK">NIK</label></h4>
                      <input id="NIK" type="text" class="form-control" name="NIK" maxlength="16" placeholder="Masukan NIK" value="{{$dataUser->NIK}}" required>

                  </div>
                  <div class="form-group">
                      <h4><label for="NamaLengkap">Nama Lengkap</label></h4>
                      <input type="text" class="form-control" id="NamaLengkap" name="NamaLengkap" placeholder="Masukan nama lengkap" value="{{$dataUser->nama_lengkap}}" required>
                  </div>
                  <div class="form-group">
                      <h4><label for="NamaPanggilan">Nama Panggilan</label></h4>
                      <input type="text" class="form-control" id="NamaPanggilan" name="NamaPanggilan" placeholder="Masukan nama panggilan" value="{{$dataUser->nama_panggilan}}">
                  </div>
                  <div class="row">
                      <div class="form-group col-6">
                          <h4><label class="my-1 mr-2" for="TempatLahir">Tempat Lahir</label></h4>
                          <input type="text" class="my-1 mr-2 form-control" name="TempatLahir" id="TempatLahir" placeholder="Masukan Tempat Lahir" value="{{$dataUser->tempat_lahir}}">
                      </div>
                      <div class="form-group col-6">
                          <h4><label class="my-1 mr-2" for="TanggalLahir">Tanggal Lahir</label></h4>
                          <input type="text" class=" my-1 mr-2 form-control" name="TanggalLahir" id="TanggalLahir" value="{{date(" Y-m-d ",strtotime($dataUser->tanggal_lahir))}}">
                          <div id="DateTanggalLahir">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <h4><label class="my-1 mr-2" for="JenisKelamin">Jenis Kelamin</label></h4>
                      <select class="custom-select my-1 mr-sm-2" id="JenisKelamin" name="JenisKelamin">
                          <option {{(isset($dataUser->jenis_kelamin) || $dataUser->jenis_kelamin == "0")? "selected" : ""}} value="">Pilih . . .</option>
                          <option {{($dataUser->jenis_kelamin=='Laki-laki')? "selected" : ""}} value="1">Laki-laki</option>
                          <option {{($dataUser->jenis_kelamin=='Perempuan')? "selected" : ""}} value="2">Perempuan</option>
                      </select>
                  </div>
                  <div id="ktp" class="border rounded form-group">
                      <div class="form-group mx-2">
                          <h4><label for="Alamat">Alamat KTP</label></h4>
                          <textarea name="Alamat" class="form-control" rows="3" id="Alamatktp">{{$dataUser->alamat_ktp}}</textarea>
                      </div>
                      <div class="row">
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Negara">Negara</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Negaraktp" name="Negaraktp">
                                  <option {{(!isset($dataUser->negara_ktp))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Negara"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->negara_ktp == $item->id)? "selected" : ""}}>{{$item->negara}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Provinsi" >Provinsi</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Provinsiktp" name="Provinsiktp" {{(!isset($dataUser->negara_ktp))? "disabled" : ""}}>
                                  <option {{(!isset($dataUser->provinsi_ktp))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Provinsiktp"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->provinsi_ktp == $item->id)? "selected" : ""}}>{{$item->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Kota">Kota</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Kotaktp" name="Kotaktp" {{(!isset($dataUser->provinsi_ktp) )? "disabled" : ""}}>
                                  <option {{(!isset($dataUser->kabkota_ktp))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Kabkotaktp"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->kabkota_ktp == $item->id)? "selected" : ""}}>{{$item->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Kecamatan" >Kecamatan</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Kecamatanktp" Name="Kecamatanktp" {{(!isset($dataUser->kabkota_ktp) )? "disabled" : ""}}>
                                  <option {{!(isset($dataUser->kecamatan_ktp))? "selected" : ""}} value="" >Pilih . . .</option>
                                  @foreach ($st_data["Kecamatanktp"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->kecamatan_ktp == $item->id)? "selected" : ""}}>{{$item->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label for="KodePos">Kode Pos</label></h4>
                              <input type="number" class="form-control" id="KodePosktp" name="KodePosktp" placeholder="Masukan Kode Pos" value="{{$dataUser->kode_pos_ktp}}">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="domisiliduplicate" checked="">
                          <label class="form-check-label" for="domisiliduplicate">
                              Check Jika alamat domisili sama dengan KTP
                          </label>
                      </div>
                  </div>
                  <div id="domisili" class="border rounded form-group">
                      <div class="form-group mx-2">
                          <h4><label for="Alamat">Alamat Domisili</label></h4>
                          <textarea name="Alamat" class="form-control" rows="3" id="Alamatdomisili">{{$dataUser->alamat_domisili}}</textarea>
                      </div>
                      <div class="row">
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Negaradomisili">Negara</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Negaradomisili" name="Negaradomisili">
                                  <option {{(!isset($dataUser->negara_domisili))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Negara"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->negara_domisili == $item->id)? "selected" : ""}}>{{$item->negara}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Provinsidomisili" >Provinsi</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Provinsidomisili" name="Provinsidomisili" {{(!isset($dataUser->negara_domisili) )? "disabled" : ""}}>
                                  <option {{(!isset($dataUser->provinsi_domisili))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Provinsidomisili"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->provinsi_domisili == $item->id)? "selected" : ""}}>{{$item->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Kotadomisili">Kota</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Kotadomisili" name="Kotadomisili" {{(!isset($dataUser->provinsi_domisili) )? "disabled" : ""}}>
                                  <option {{(!isset($dataUser->kabkota_domisili))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Kabkotadomisili"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->kabkota_domisili == $item->id)? "selected" : ""}}>{{$item->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label class="my-1 mr-2" for="Kecamatandomisili" >Kecamatan</label></h4>
                              <select class="custom-select my-1 mr-sm-2" id="Kecamatandomisili" Name="Kecamatandomisili" {{(!isset($dataUser->kabkota_domisili) )? "disabled" : ""}}>
                                  <option {{!(isset($dataUser->kecamatan_domisili))? "selected" : ""}} value="">Pilih . . .</option>
                                  @foreach ($st_data["Kecamatandomisili"] as $item)
                                  <option value="{{$item->id}}" {{($dataUser->kecamatan_domisili == $item->id)? "selected" : ""}}>{{$item->name}}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="col-lg-5 col-xs-10 mx-2 form-group">
                              <h4><label for="KodePosdomisili">Kode Pos</label></h4>
                              <input type="number" class="form-control" id="KodePosdomisili" name="KodePosdomisili" placeholder="Masukan Kode Pos" value="{{$dataUser->kode_pos_domisili}}">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <h4><label for="Email">Email</label></h4>
                      <input type="email" class="form-control" id="Email" name="Email" placeholder="Masukan alamat email" value="{{$dataUser->email}}">
                  </div>
                  <div class="form-group">
                      <h4><label for="NoTelp">No Telephone</label></h4>
                      <input type="tel" class="form-control" id="NoTelp" name="NoTelp" placeholder="Masukan nomer telephone" value="{{$dataUser->notelp}}">
                  </div>
                  <div class="form-group">
                      <h4><label for="NoHP">No Handphone</label></h4>
                      <input type="tel" class="form-control" id="NoHP" name="NoHP" placeholder="Masukan nomer handphone" value="{{$dataUser->nohp}}">
                  </div>
                  <div class="form-group" style="display:none">
                      <h4><label class="my-1 mr-2" for="Agama">Agama</label></h4>
                      <select class="custom-select my-1 mr-sm-2" id="Agama" name="Agama">
                          <option {{(!isset($dataUser->agama) || $dataUser->agama=='0')? "selected" : ""}} value="">Pilih . . .</option>
                          <option {{($dataUser->agama=='Islam')? "selected" : ""}} value="1">Islam</option>
                          <option {{($dataUser->agama=='Kristen Protestan')? "selected" : ""}} value="2">Kristen Protestan</option>
                          <option {{($dataUser->agama=='Kristen Katolik')? "selected" : ""}} value="3">Kristen Katolik</option>
                          <option {{($dataUser->agama=='Hindu')? "selected" : ""}} value="4">Hindu</option>
                          <option {{($dataUser->agama=='Budha')? "selected" : ""}} value="5">Budha</option>
                          <option {{($dataUser->agama=='Kong Hu Chu')? "selected" : ""}} value="6">Kong Hu Chu</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <h4>Informasi ID Card</h4>
                      <label class="my-1 mr-2" for="IDCard">ID Card</label>
                      <select class="custom-select my-1 mr-sm-2" id="IDCard" name="IDCard">
                          <option {{(!isset($dataUser->kategori_idcard) || $dataUser->kategori_idcard=='0')? "selected" : ""}} value="">Pilih . . .</option>
                          @foreach ($st_data["Idcard"] as $item)
                          <option {{($dataUser->kategori_idcard==$item->id)? "selected" : ""}} value="{{$item->id}}">{{$item->kartu}}</option>
                          @endforeach
                      </select>
                      <label for="NoIDCard" name="NoIDCard">NOMOR ID</label>
                      <input type="text" class="form-control" id="NoIDCard" placeholder="Masukan Nomer ID Card" value="{{$dataUser->nomor_idcard}}">
                  </div>
              </div>
          </div>
      </form>
      <div class="item">
          <div class="mr-0">
              <!--button type="button" class="btn btn-secondary btn-lg" width='20px' height='20px'>Reset</button -->
              <button type="button" class="btn btn-primary btn-lg" id="submitIdentitas">
                  <a>Simpan</a>
                  <img id="loader" src='{{asset(' img/loader.gif ') }}' width='20px' height='20px' style="display:none;">
              </button>
          </div>
      </div>
  </div>
</div>
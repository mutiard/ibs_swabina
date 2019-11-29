<div id="lampiran"  class="tab-content my-resume">
    <div class="inner-box">
        <div class="item">
            <h3>Lampiran</h3>
        </div>
        <div class="inner-box">
            <div class="item">
                <!--keluarga-->
                
                <form id="fotopelamar" enctype="multipart/form-data">
                    <div class="form-group {{($dataUser->lampiran_foto)?"hidden-block":""}}">
                        <h4>Foto Pelamar</h4>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="fotopelamar" class="custom-file-input" id="fotopelamar">
                          <label class="custom-file-label" for="fotopelamar">Pilih file</label>
                          </div>
                        </div>
                      </div>
                      
                      <div class="job-listings-featured block-action {{(!$dataUser->lampiran_foto)?"hidden-block":"isUploaded"}}" id="fotopelamar-show">
                        <div class="row">
                          <div class="col-lg-5 col-md-5 col-xs-12">
                            <div class="job-details ml-5 mt-4">
                            <h3 class="title">Foto.{{pathinfo($dataUser->lampiran_foto,PATHINFO_EXTENSION)}}</h3>
                              <small>Foto Pelamar</small>
                            </div>
                          </div>
                          <div class="col-lg-7 col-md-7 col-xs-12 text-right">
                            <div class="tag-type mt-4">
                              <button data-href="{{url('/jobseeker/lampiran/foto/')}}" type="button" class="btn btn-common preview-file"><i class="fa fa-eye">&nbsp;</i>Preview</button>
                              <button type="button" class="btn btn-primary submit-file hidden-block"><i class="fa fa-upload">&nbsp;</i>Unggah
                                <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                              </button>
                              <button type="button"  data-toggle="modal" data-target="#deletemodal_lampiran" class="btn btn-danger del-file"><i class="fa fa-trash"></i></button>
                              <button type="button" class="btn btn-light close-file hidden-block"><i class="fa fa-times text-dark">&nbsp;</i></button>
                            </div>
                          </div>
                      </div>
                    </div>
                    
                  </form>

                  <form id="scanijazah" enctype="multipart/form-data">
                      <div class="form-group {{($dataUser->lampiran_ijazah)?"hidden-block":""}}">
                          <h4>Scan Ijazah</h4>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="scanijazah" class="custom-file-input" id="scanijazah">
                              <label class="custom-file-label" for="scanijazah" >Pilih file</label>
                            </div>
                          </div>
                        </div>
                      
                        <div class="job-listings-featured block-action {{(!$dataUser->lampiran_ijazah)?"hidden-block":"isUploaded"}}" id="ijazah-show">
                          <div class="row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                              <div class="job-details ml-5 mt-4">
                                <h3 class="title">ScanIjazah.{{pathinfo($dataUser->lampiran_ijazah,PATHINFO_EXTENSION)}}</h3>
                                <small>Scan Ijazah</small>
                              </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-xs-12 text-right">
                              <div class="tag-type mt-4">
                                <button data-href="lampiran/scanijazah" type="button" class="btn btn-common preview-file"><i class="fa fa-eye">&nbsp;</i>Preview</button>
                                <button type="button" class="btn btn-primary submit-file hidden-block"><i class="fa fa-upload">&nbsp;</i>Unggah
                                  <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                                </button>
                                <button type="button" type="button"  data-toggle="modal" data-target="#deletemodal_lampiran" class="btn btn-danger del-file"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-light close-file hidden-block"><i class="fa fa-times text-dark">&nbsp;</i></button>
                              </div>
                            </div>
                        </div>
                      </div>
                      
                    </form>

                    <form id="scantranskrip" enctype="multipart/form-data">
                      
                        <div class="form-group {{($dataUser->lampiran_transkripnilai)?"hidden-block":""}}">
                            <h4>Scan Transkrip Nilai</h4>
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="scantranskrip" class="custom-file-input" id="scantranskrip">
                                  <label class="custom-file-label" for="scantranskrip">Pilih file</label>
                                </div>
                              </div>
                          </div>
                        
                          <div class="job-listings-featured block-action {{(!$dataUser->lampiran_transkripnilai)?"hidden-block":"isUploaded"}}" id="transkrip-show">
                            <div class="row">
                              <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="job-details ml-5 mt-4">
                                  <h3 class="title">ScanTranskrip.{{pathinfo($dataUser->lampiran_transkripnilai,PATHINFO_EXTENSION)}}</h3>
                                  <small>Scan Transkrip Nilai</small>
                                </div>
                              </div>
                              <div class="col-lg-7 col-md-7 col-xs-12 text-right">
                                <div class="tag-type mt-4">
                                  <button data-href="lampiran/scantranskrip" type="button" class="btn btn-common preview-file"><i class="fa fa-eye">&nbsp;</i>Preview</button>
                                  <button type="button" class="btn btn-primary submit-file hidden-block"><i class="fa fa-upload">&nbsp;</i>Unggah
                                    <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                                  </button>
                                  <button type="button"  data-toggle="modal" data-target="#deletemodal_lampiran" class="btn btn-danger del-file"><i class="fa fa-trash"></i></button>
                                  <button type="button" class="btn btn-light close-file hidden-block"><i class="fa fa-times text-dark">&nbsp;</i></button>
                                </div>
                              </div>
                          </div>
                        </div>
                    </form>

                    <form id="scanreferensi" enctype="multipart/form-data">
                          <div class="form-group {{($dataUser->lampiran_referensikerja)?"hidden-block":""}}">
                              <h4>Scan Referensi Kerja</h4>
                              <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="scanreferensi" class="custom-file-input" id="scanreferensi">
                                    <label class="custom-file-label" for="scanreferensi">Pilih file</label>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="job-listings-featured block-action {{(!$dataUser->lampiran_referensikerja)?"hidden-block":"isUploaded"}}" id="referensikerja-show">
                              <div class="row">
                                <div class="col-lg-5 col-md-5 col-xs-12">
                                  <div class="job-details ml-5 mt-4">
                                    <h3 class="title">ScanReferensi.{{pathinfo($dataUser->lampiran_referensikerja,PATHINFO_EXTENSION)}}</h3>
                                    <small>Scan Referensi Kerja</small>
                                  </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-xs-12 text-right">
                                  <div class="tag-type mt-4">
                                    <button data-href="lampiran/scanreferensi" type="button" class="btn btn-common preview-file"><i class="fa fa-eye">&nbsp;</i>Preview</button>
                                    <button type="button" class="btn btn-primary submit-file hidden-block"><i class="fa fa-upload">&nbsp;</i>Unggah
                                      <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
                                    </button>
                                    <button type="button" data-toggle="modal" data-target="#deletemodal_lampiran" class="btn btn-danger del-file"><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-light close-file hidden-block"><i class="fa fa-times text-dark">&nbsp;</i></button>
                                  </div>
                                </div>
                            </div>
                          </div>

                    </form>

                      <div class="job-listings-featured block-action">
                        <div class="row">
                          <div class="col-lg-7 col-md-7 col-xs-12 text-right">
                            <div class="tag-type mt-4">
                              <a href="{{url('/jobseeker/cetakpdf')}}" target="_blank"><button type="button" class="btn btn-common">Download CV.pdf</button></a>
                            </div>
                          </div>
                      </div>
                    </div>


            </div>
        </div>
    </div>
</div>
        
        
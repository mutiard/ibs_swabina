<div id="keluarga"  class="tab-content my-resume">
    <div class="inner-box">
      <div class="item">
        <h3>Status Perkawinan</h3>
      </div>
      <div class="inner-box" style="overflow:auto; height:50vh;">
        <div class="item">
          <!--keluarga-->
            <div class="form-group">
            <form id="statusperkawinan">
              <h4><label class="my-1 mr-2" for="StatusKeluarga">Status Perkawinan</label></h4>
              <select class="custom-select my-1 mr-sm-2" id="StatusKeluarga">
                  <option {{(!isset($dataUser->status_keluarga) || $dataUser->status_keluarga == "0" )? "selected" : ""}} value="0">Pilih . . .</option>
                  <option {{($dataUser->status_keluarga=='Lajang')? "selected" : ""}} value="1">Lajang</option>
                  <option {{($dataUser->status_keluarga=='Menikah')? "selected" : ""}} value="2">Menikah</option>
                  <option {{($dataUser->status_keluarga=='Sudah Bercerai')? "selected" : ""}} value="3">Sudah Bercerai</option>
              </select>
            </div>
            <div class="form-group">
                <h4><label class="my-1 mr-2" for="TanggalKeluarga">Sejak</label></h4>
                <input type="date" class="form-control" id="TanggalKeluarga" placeholder="Sejak Tahun" {{(!isset($dataUser->tanggal_keluarga) || $dataUser->tanggal_keluarga == "" )? "disabled" : ""}}  value="{{$dataUser->tanggal_keluarga}}">
            </div>
        </form>
          <!--keluarga end-->
                </div>
              </div>
    <div class="item">
    <div class="mr-0">
        <!--button type="button" class="btn btn-secondary btn-lg" width='20px' height='20px'>Reset</button -->
        <button type="button" class="btn btn-primary btn-lg" id="submitIdentitas">
          <a>Simpan</a>
          <img id="loader" src='{{asset('img/loader.gif') }}' width='20px' height='20px' style="display:none;">
        </button>
    </div>
    </div>
  </div>
    <script>

        $("#statusperkawinan #StatusKeluarga").change(function(){
            if(this.value==1 || this.value==0){
                $("#TanggalKeluarga").prop("disabled", true);
                $("#TanggalKeluarga").val('');
            }else{
                $("#TanggalKeluarga").prop("disabled", false);
            }
        });
    </script>
</div>
    
    
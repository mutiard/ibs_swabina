<div id="input-periode" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Periode Penilaian</h4>
            </div>
            <form method="POST" action="{{url('periode_penilaian/store')}}" class="form-horizontal form-penilaian-wali" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="form-mapel">
                        <label class="col-sm-2 control-label" for="periode">Periode Bulan</label>
                        <label class="col-sm-2" for="periode">Dari</label>
                        <div class="col-sm-3">
                            <select class="form-control chosen-select-width5" name="s_bulan" required="">
                              <option value="" selected disabled>Bulan</option>
                              @php
                              for ($i = 1; $i <= 12; $i++) {
                              $timestamp = mktime(0, 0, 0, $i);
                              $label = date("F", $timestamp);
                              print '<option value="' . $label . '">' . $label . '</option>"n"';
                          }
                          @endphp
                      </select>
                  </div>
                  <label class="col-sm-2" for="periode">Hingga</label>
                  <div class="col-sm-3">
                    <select class="form-control chosen-select-width5" name="e_bulan" required="">
                      <option value="" selected disabled>Bulan</option>
                      @php
                      for ($i = 1; $i <= 12; $i++) {
                      $timestamp = mktime(0, 0, 0, $i);
                      $label = date("F", $timestamp);
                      print '<option value="' . $label . '">' . $label . '</option>"n"';
                  }
                  @endphp
              </select>
          </div>
      </div>
      <div class="form-group" id="form-mapel">
        <label class="col-sm-2 control-label" for="periode">Tahun</label>
        <div class="col-sm-10">
            <select class="form-control chosen-select-width5" name="tahun" required="">
                <option value="" selected disabled>Tahun</option>
                @php
                $currently_selected = date('Y'); 
                $earliest_year = 2050; 
                $latest_year = date('Y'); 
                foreach(range( $latest_year, $earliest_year ) as $i )
                print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                @endphp
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>

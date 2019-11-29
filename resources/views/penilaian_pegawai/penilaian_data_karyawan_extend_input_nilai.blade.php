<div id="input-nilai" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Nilai Pegawai</h4>
            </div>
            <form method="POST" action="#" class="form-horizontal form-penilaian-wali" enctype="multipart/form-data">
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
                    <div class="form-group"><label class="col-sm-2 control-label" for="id">ID</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="id" id="id" readonly=""></div>
                    </div>
                    <div class="form-group" id="form-mapel">
                        <label class="col-sm-2 control-label" for="periode">Periode</label>
                        <div class="col-sm-10">
                            <select data-placeholder="Pilih Periode" name="periode" id="periode" class="form-control">
                                <option value="">--Pilih Periode--</option>
                                @foreach($periode as $value)
                                <option value="{{$value->id_periode_nilai}}">{{$value->s_bulan}}-{{$value->e_bulan}} {{$value->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" for="formatif1">Formatif 1</label>
                        <div class="col-sm-10"><input type="number" class="form-control" name="formatif1" id="formatif1"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" for="pts">Penilaian Tengah Semester</label>
                        <div class="col-sm-10"><input type="number" class="form-control" name="pts" id="pts"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" for="formatif2">Formatif 2</label>
                        <div class="col-sm-10"><input type="number" class="form-control" name="formatif2" id="formatif2"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label" for="pas">Penilaian Akhir Semester</label>
                        <div class="col-sm-10"><input type="number" class="form-control" name="pas" id="pas"></div>
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

<div id="input-nilai" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Nilai Pegawai</h4>
            </div>
            <form method="POST" action="{{url('terima_pelamar')}}/{{$u->users_id}}" class="form-horizontal form-penilaian-wali" enctype="multipart/form-data">
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
                        <label class="col-sm-2 control-label" for="site">Lokasi</label>
                        <div class="col-sm-10">
                            <select data-placeholder="Pilih Lokasi" name="site" id="site" class="form-control">
                                <option value="">--Pilih Lokasi--</option>
                                @foreach($site as $value)
                                <option value="{{$value->id}}">{{$value->deskripsi}}</option>
                                @endforeach
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

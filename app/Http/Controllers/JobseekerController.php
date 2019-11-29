<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Gate;
use Alert;
//---=main data
use App\md_lowongan_pekerjaan;
use App\md_jobseeker;
use App\trans_lowongan_pekerjaan;
//---- st
use App\st_Negara;
use App\st_Provinsi;
use App\st_Kabkota;
use App\st_Kecamatan;
use App\st_Tingkatpendidikan;
use App\st_Statuskeluarga;
use App\st_Spesialisasipekerjaan;
use App\st_Kategoripekerjaan;
use App\st_Bisnisperusahaan;
use App\st_Idcard;
use App\st_Kemampuan;
use App\st_Lingkungankerja;
use App\st_Leveljabatan;
use App\st_Posisikerja;
use App\st_Bahasa;

//--st support md
use App\st_jobseeker_riwayatpenyakit;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pendidikanbahasa;
use App\st_jobseeker_minatkerja;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use PDF;

class JobseekerController extends Controller
{
    public function getDashboard(){
      if(!Gate::allows('isJobseeker')){
          return redirect()->route("PublicLowongan");
      }
      $statusUser  = DB::table('md_jobseeker')->select('status_data_identitas','status_data_pendidikan','status_data_pekerjaan','status_data_aktivitas','status_data_riwayatpenyakit','status_data_minat')
                    ->where('users_id',\Auth::user()->id)->first();
      if($statusUser->status_data_identitas==0 ||  $statusUser->status_data_pendidikan==0 || $statusUser->status_data_minat==0)
      return redirect()->route('JobseekerDatadiri')->with('alert','Anda belum dapat melihat lowongan !!');

      //$lowongan_pekerjaan=md_lowongan_pekerjaan::paginate(10);
      $lowongan_pekerjaan=DB::table('md_lowongan_pekerjaan')
                     ->join('md_client', 'md_lowongan_pekerjaan.md_client_id', '=', 'md_client.id')
                     ->select('md_lowongan_pekerjaan.*', 'md_client.nama_client')
                     ->paginate(10);
      $provinsi=st_Provinsi::all();
      $kota_all=st_Kabkota::all();
      return view ('jobseeker.dashboard.index',compact('lowongan_pekerjaan','provinsi','kota_all'));
    }

    public function getProfil(){
      if(!Gate::allows('isJobseeker')){
          abort(404,"Maaf Anda tidak memiliki akses");
      }
      $profil=md_jobseeker::all()->where('users_id',\Auth::user()->id);
      return view ('jobseeker.profil.index',compact('profil'));
    }

    public function getNotifikasi(){
      if(!Gate::allows('isJobseeker')){
          abort(404,"Maaf Anda tidak memiliki akses");
      }
      return view ('jobseeker.notifikasi.index');
    }

    public function showLowonganpublic($id){
      $lowongan = md_lowongan_pekerjaan::find($id);
      return view ('jobseeker.dashboard.showpublic',compact('lowongan'));
    }
    //insert Data diri
    // public function insertDataDiri()
    // {
    //   //st_support data
    //   $st_data = [];
    //   $st_data['Idcard'] = st_Idcard::all();
    //   $st_data['TingkatPendidikan'] = st_Tingkatpendidikan::all();
    //   $st_data['Bahasa'] = st_Bahasa::all();
    //   $st_data['Kemampuan'] = st_Kemampuan::all();
    //   $st_data['BisnisPerusahaan'] = st_Bisnisperusahaan::all();
    //   $st_data['kategoriPekerjaan'] = st_Kategoripekerjaan::all();
    //   $st_data['SpesialisasiPekerjaan']=st_Spesialisasipekerjaan::all();
    //   $st_data['LingkunganKerja']= st_Lingkungankerja::all();
    //   $st_data['LevelJabatan']= st_Leveljabatan::all();
    //   $st_data['PosisiKerja']= st_Posisikerja::all();
    //   //support data
    //   $st_data['Negaraktp'] = st_Negara::all();
    //   $st_data['Provinsiktp'] = st_Provinsi::where('id',)
    //   $st_data['Kabkotaktp'] = st_Kabkota::where('id')
    //   $st_data['Kecamatanktp'] = st_Kecamatan::where('id')

    //   $st_data['Negaradomisili'] = $st_data['Negaraktp'];
    //   $st_data['Provinsidomisili'] = st_Provinsi::where('id')
    //   $st_data['Kabkotadomisili'] = st_Kabkota::where('id')
    //   $st_data['Kecamatandomisili'] = st_Kecamatan::where('id')

    //   return view('jobseeker.datadiri.insertdatadiri',compact('st_data'));
    // }
    //Lamaran Section
    public function showDataDiri(){
      $user_id = \Auth::user()->id;

      $dataUser = md_jobseeker::where('users_id',$user_id)->first();
      //st_jobseeker
      $dataUserSt['PendidikanFormal']     = st_jobseeker_pendidikanformal::where('user_id',$user_id)->get();
      $dataUserSt['PendidikanInformal']   = st_jobseeker_pendidikaninformal::where('user_id',$user_id)->get();
      $dataUserSt['PendidikanBahasa']     = st_jobseeker_pendidikanbahasa::where('user_id',$user_id)->get();
      $dataUserSt['RiwayatPenyakit']      = st_jobseeker_riwayatpenyakit::where('user_id',$user_id)->get();
      $dataUserSt['PengalamanOrganisasi'] = st_jobseeker_pengalamanorganisasi::where('user_id',$user_id)->orderBy('tanggal_akhir','asc')->get();
      $dataUserSt['MinatKerja']           = st_jobseeker_minatkerja::where('user_id',$user_id)->get();
      $dataUserSt['RiwayatKerja']         = st_jobseeker_pengalamankerja::where('user_id',$user_id)->orderBy('tanggal_akhir','asc')->get();
      $dataUserSt['Status'] =
      [
        "identitas"=>$dataUser->status_data_identitas,
        "keluarga"=>$dataUser->status_data_keluarga,
        "pendidikan"=>$dataUser->status_data_pendidikan,
        "pengalamankerja"=>$dataUser->status_data_pekerjaan,
        "minatkerja"=>$dataUser->status_data_minat,
        "aktivitas"=>$dataUser->status_data_aktivitas,
        "riwayatpenyakit"=>$dataUser->status_data_riwayatpenyakit,
        "lampiran"=>$dataUser->status_data_lampiran,
      ];


      //st_support data
      $st_data = [];
      $st_data['Idcard'] = st_Idcard::all();
      $st_data['TingkatPendidikan'] = st_Tingkatpendidikan::all();
      $st_data['Bahasa'] = st_Bahasa::all();
      $st_data['Kemampuan'] = st_Kemampuan::all();
      $st_data['BisnisPerusahaan'] = st_Bisnisperusahaan::all();
      $st_data['kategoriPekerjaan'] = st_Kategoripekerjaan::all();
      $st_data['SpesialisasiPekerjaan']=st_Spesialisasipekerjaan::all();
      $st_data['LingkunganKerja']= st_Lingkungankerja::all();
      $st_data['LevelJabatan']= st_Leveljabatan::all();
      $st_data['PosisiKerja']= st_Posisikerja::all();
      $st_data['Negara'] = st_Negara::all();
        //->support data with user carry
        $st_data['Provinsiktp'] = st_Provinsi::where('country_id',$dataUser->negara_ktp)->get();
        $st_data['Kabkotaktp'] = st_Kabkota::where('province_id',$dataUser->provinsi_ktp)->get();
        $st_data['Kecamatanktp'] = st_Kecamatan::where('regency_id',$dataUser->kabkota_ktp)->get();
        $st_data['Provinsidomisili'] = st_Provinsi::where('country_id',$dataUser->negara_domisili)->get();
        $st_data['Kabkotadomisili'] = st_Kabkota::where('province_id',$dataUser->provinsi_domisili)->get();
        $st_data['Kecamatandomisili'] = st_Kecamatan::where('regency_id',$dataUser->kabkota_domisili)->get();

      return view('jobseeker.datadiri.index',compact('st_data','dataUser','dataUserSt'));
    }

    public function storeDataDiri(Request $request){
      $dataUser = md_jobseeker::find(\Auth::user())->first();
      $request['tanggal_lahir'] = date('Y-m-d',strtotime($request->tanggal_lahir));

      if($request->is_domisiliktp){
        $request['alamat_domisili']       = $request['alamat_ktp'];
        $request['negara_domisili']       = $request['negara_ktp'];
        $request['provinsi_domisili']     = $request['provinsi_ktp'];
        $request['kabkota_domisili']      = $request['kabkota_ktp'];
        $request['kecamatan_domisili']    = $request['kecamatan_ktp'];
        $request['kode_pos_domisili']     = $request['kode_pos_ktp'];
      }
      $request->request->remove('is_domisiliktp');

      try {
        $dataUser->update($request->all());
        $statusIdentitas = $dataUser->setStatusIdentitas();
        $statusKeluarga  = $dataUser->setStatusKeluarga();
        $statusLainnya   = $dataUser->setStatusRiwayatPenyakit();
        $statusAktivitas = $dataUser->setStatusAktivitas();
        return response()->json(["success"=>true,"statusIdentitas"=> $statusIdentitas,"statusKeluarga"=>$statusKeluarga,"statusLainnya"=>$statusLainnya,"statusAktivitas"=>$statusAktivitas]);
      } catch (\Throwable $th) {
        return response()->json(["success"=>false]);
      }
    }

    public function storeDataPendidikanFormal(Request $request){
      $pendidikanFormal = st_jobseeker_pendidikanformal::where('user_id',\Auth::user()->id)
                                                         ->where('id',$request->id)->first();

      $request->request->add(['user_id'=>\Auth::user()->id]);
      $request['tanggal_mulai'] = $request->tahun_mulai."-01"."-01";
      $request['tanggal_akhir'] = $request->tahun_akhir."-12"."-31";

      if($pendidikanFormal==null){
        $request->request->remove('id');
        try {
          $newdata = st_jobseeker_pendidikanformal::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(['success'=>true,"id"=>$newdata->id,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }}
      else {
        try {
          $pendidikanFormal->update($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(['success'=>true,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }}
    }

    public function storeDataPendidikanInformal(Request $request){
      $pendidikanInformal = st_jobseeker_pendidikaninformal::where('user_id',\Auth::user()->id)
                                                         ->where('id',$request->id)->first();

      $request->request->add(['user_id'=>\Auth::user()->id]);
      $request['tanggal_mulai'] = $request->tanggal_mulai."-01"."-01";
      $request['tanggal_akhir'] = $request->tanggal_akhir."-12"."-31";
      if($pendidikanInformal==null){
        $request->request->remove('id');
        try {
          $newdata = st_jobseeker_pendidikaninformal::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(['success'=>true,"id"=>$newdata->id,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }}
      else{
        try {
          $pendidikanInformal->update($request->all());
          return response()->json(['success'=>true]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }}
    }

    public function storeDataPendidikanBahasa(Request $request){
      $pendidikanBahasa = st_jobseeker_pendidikanbahasa::where('user_id',\Auth::user()->id)
                                                          ->where('id',$request->id)->first();
      $request->request->add(['user_id'=>\Auth::user()->id]);

      if($pendidikanBahasa==null){
        $request->request->remove('id');
        try {
          $newdata = st_jobseeker_pendidikanbahasa::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(['success'=>true,"id"=>$newdata->id,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }
      }
      else{
        try {
          $pendidikanBahasa->update($request->all());
          return response()->json(['success'=>true]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }}
    }

    public function storeDataPengalamanKerja(Request $request){
      $riwayatKerja = st_jobseeker_pengalamankerja::where('user_id',\Auth::user()->id)
                                                    ->where('id',$request->id)->first();
      $request->request->add(['user_id'=>\Auth::user()->id]);
      $request['tanggal_mulai'] = date('Y-m-01',strtotime($request->tanggal_mulai));
      $request['tanggal_akhir'] = date('Y-m-t',strtotime($request->tanggal_akhir));
      if($riwayatKerja==null){
        $request->request->remove('id');
        try {
          $dataUser = st_jobseeker_pengalamankerja::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusPekerjaan();
          return response()->json(["success"=>true,"id"=>$dataUser->id,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}
      else{
        try {
          $riwayatKerja->update($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusPekerjaan();
          return response()->json(["success"=>true,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}
    }

    public function storeDataPengalamanOrganisasi(Request $request){
       $pengalamanOrganisasi = st_jobseeker_pengalamanorganisasi:: where('user_id',\Auth::user()->id)
                                                                  ->where('id',$request->id)->first();
       $request->request->add(['user_id'=>\Auth::user()->id]);
       $request['tanggal_mulai'] = date('Y-m-01',strtotime($request->tanggal_mulai));
       $request['tanggal_akhir'] = date('Y-m-t',strtotime($request->tanggal_akhir));
      if($pengalamanOrganisasi==null){
        try {
          $request->request->remove('id');
          $dataUser = st_jobseeker_pengalamanorganisasi::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusAktivitas();
          return response()->json(['success'=>true,"id"=>$dataUser->id,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(['success'=>false]);
        }}
        else{
          try {
            $pengalamanOrganisasi->update($request->all());
            $status = md_jobseeker::find(\Auth::id())->setStatusAktivitas();
            return response()->json(['success'=>true,"statusform"=>$status]);
          } catch (\Throwable $th) {
            return response()->json(['success'=>false]);
          }
        }

    }

    public function storeDataRiwayatPenyakit(Request $request){
      $riwayatPenyakit = st_jobseeker_riwayatpenyakit:: where('user_id',\Auth::user()->id)
                                                        ->where('id',$request->id)->first();
      $request['tanggal_mulai'] = date('Y-m-01',strtotime($request->tanggal_mulai));
      $request['tanggal_akhir'] = date('Y-m-t',strtotime($request->tanggal_akhir));
      $request->request->add(['user_id'=>\Auth::user()->id]);
      if($riwayatPenyakit==null){
        $request->request->remove('id');
        try{
          $dataUser = st_jobseeker_riwayatpenyakit::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusRiwayatPenyakit();
          return response()->json(["success"=>true,"id"=>$dataUser->id,"statusform"=>$status]);
        }catch(\Throwable $th){
          return response()->json(["success"=>false]);
        }}
        else{
          try {
            $riwayatPenyakit->update($request->all());
            $status = md_jobseeker::find(\Auth::id())->setStatusRiwayatPenyakit();
            return response()->json(["success"=>true,"statusform"=>$status]);
          } catch (\Throwable $th) {
            return response()->json(["success"=>false]);
          }}
    }

    public function storeDataMinat(Request $request){
      $dataMinat = st_jobseeker_minatkerja::where('user_id',\Auth::user()->id)
                                            ->where('id',$request->id)->first();
      $request->request->add(['user_id'=>\Auth::user()->id]);
      if($dataMinat==null){
        $request->request->remove('id');
        try {
          $dataUser = st_jobseeker_minatkerja::create($request->all());
          $status = md_jobseeker::find(\Auth::id())->setStatusMinat();
          return response()->json(["success"=>true,"id"=>$dataUser->id,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}
        else{
          try {
            $dataMinat->update($request->all());
            $status = md_jobseeker::find(\Auth::id())->setStatusMinat();
            return response()->json(["success"=>true,"statusform"=>$status]);
          } catch (\Throwable $th) {
            return response()->json(["success"=>false]);
          }}
    }

      public function destroyDataPendidikanFormal(Request $request){
        try {
          $pendidikanFormal = st_jobseeker_pendidikanformal::where('user_id',\Auth::user()->id)
                                                         ->where('id',$request->id)->first();
          $pendidikanFormal->delete();
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(["success"=>true,"statusform"=>$status,"statussection"=>"status_data_pendidikan"]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}

      public function destroyDataPendidikanInformal(Request $request){
        try {
          $pendidikanInformal = st_jobseeker_pendidikaninformal::where('user_id',\Auth::user()->id)
                                                         ->where('id',$request->id)->first();
          $pendidikanInformal->delete();
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(["success"=>true,"statusform"=>$status,"statussection"=>"status_data_pendidikan"]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}

      public function destroyDataPendidikanBahasa(Request $request){
        try {
          $pendidikanBahasa = st_jobseeker_pendidikanbahasa::where('user_id',\Auth::user()->id)
                                                          ->where('id',$request->id)->first();
          $pendidikanBahasa->delete();
          $status = md_jobseeker::find(\Auth::id())->setStatusPendidikan();
          return response()->json(["success"=>true,"statusform"=>$status,"statussection"=>"status_data_pendidikan"]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}

      public function destroyDataPengalamanKerja(Request $request){
       try {
            $riwayatKerja = st_jobseeker_pengalamankerja::where('user_id',\Auth::user()->id)
                                                          ->where('id',$request->id)->first();
            $riwayatKerja->delete();
            $status = md_jobseeker::find(\Auth::id())->setStatusPekerjaan();
            return response()->json(["success"=>true,"statusform"=>$status,"statussection"=>"status_data_pekerjaan"]);
       } catch (\Throwable $th) {
            return response()->json(["success"=>false]);
       } }

      public function destroyDataPengalamanOrganisasi(Request $request){
        try {
          $pengalamanOrganisasi = st_jobseeker_pengalamanorganisasi:: where('user_id',\Auth::user()->id)
                                                                  ->where('id',$request->id)->first();
          $pengalamanOrganisasi->delete();
          $status = md_jobseeker::find(\Auth::id())->setStatusAktivitas();
          return response()->json(["success"=>true,"statusform"=>$status,"statussection"=>"status_data_aktivitas"]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}

      public function destroyDataRiwayatPenyakit(Request $request){
        try {
          $riwayatPenyakit = st_jobseeker_riwayatpenyakit:: where('user_id',\Auth::user()->id)
                                                          ->where('id',$request->id)->first();
          $riwayatPenyakit->delete();
          $status = md_jobseeker::find(\Auth::id())->setStatusRiwayatPenyakit();
          return response()->json(["success"=>true,'statusform'=>$status,"statussection"=>"status_data_lainnya"]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}

      public function destroyDataMinat(Request $request){
        try {
          $dataMinat = st_jobseeker_minatkerja::where('user_id',\Auth::user()->id)
                                            ->where('id',$request->id)->first();
          $dataMinat->delete();
          $status = md_jobseeker::find(\Auth::id())->setStatusMinat();
          return response()->json(["success"=>true,"statusform"=>$status,"statussection"=>"status_data_minat"]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>false]);
        }}

      public function storeDataLampiran(Request $request){
        $pathFoto = "foto_pelamar/";
        $pathIjazah = "scan_ijazah/";
        $pathTranskrip ="scan_transkrip/";
        $pathReferensi = "scan_referensi/";
        $pathChoosen = "";
        $columnName ="";
        $file = "";
        try {
          if($request->file()){
            if($request->file('fotopelamar')){
              $file =Input::file('fotopelamar');
              $pathChoosen = $pathFoto;
              $columnName = "lampiran_foto";
            }elseif($request->file('scanijazah')){
              $file =Input::file('scanijazah');
              $pathChoosen = $pathIjazah;
              $columnName = "lampiran_ijazah";

            }elseif($request->file('scantranskrip')){
              $file =Input::file('scantranskrip');
              $pathChoosen = $pathTranskrip;
              $columnName = "lampiran_transkripnilai";

            }elseif($request->file('scanreferensi')){
              $file =Input::file('scanreferensi');
              $pathChoosen = $pathReferensi;
              $columnName = "lampiran_referensikerja";
            }
              $datafile = md_jobseeker::find(\Auth::id());
              $extension = $file->getClientOriginalExtension();
              $datafile_name = pathinfo($datafile['columnName'], PATHINFO_FILENAME);

              $nameWill = ($datafile_name) ? $datafile_name : Uuid::uuid4()->toString();
              $nameWill = $nameWill.".".$extension;

              Storage::disk('jobseeker')->delete($pathChoosen.$datafile[$columnName]);
              Storage::disk('jobseeker')->putFileAs($pathChoosen,$file,$nameWill);
              $datafile[$columnName] = $nameWill;
              $datafile->save();

              $status = md_jobseeker::find(\Auth::id())->setStatusLampiran();
              return response()->json(["success"=>1,"statusform"=>$status]);
          }

        } catch (\Throwable $th) {
        }

      }

      public function destroyDataLampiran(Request $request){
        $pathFoto = "foto_pelamar/";
        $pathIjazah = "scan_ijazah/";
        $pathTranskrip ="scan_transkrip/";
        $pathReferensi = "scan_referensi/";

        $datafile = md_jobseeker::find(\Auth::id());
        $columnName = "";
        $pathChoosen = "";
        try {
          if($request->id=="fotopelamar"){
            $columnName = "lampiran_foto";
            $pathChoosen = $pathFoto;
          }elseif($request->id=="scanijazah"){
            $columnName = "lampiran_ijazah";
            $pathChoosen = $pathIjazah;
          }elseif($request->id=="scantranskrip"){
            $columnName = "lampiran_transkripnilai";
            $pathChoosen = $pathTranskrip;
          }elseif($request->id=="scanreferensi"){
            $columnName = "lampiran_referensikerja";
            $pathChoosen = $pathReferensi;
          }

          Storage::disk("jobseeker")->delete($pathChoosen.$datafile[$columnName]);
          $datafile[$columnName]=null;
          $datafile->save();
          $status = md_jobseeker::find(\Auth::id())->setStatusLampiran();
          return response()->json(["success"=>1,"statusform"=>$status]);
        } catch (\Throwable $th) {
          return response()->json(["success"=>0]);
        }

      }

      public function getLampiran($kategori){
        $pathFoto = "foto_pelamar/";
        $pathIjazah = "scan_ijazah/";
        $pathTranskrip ="scan_transkrip/";
        $pathReferensi = "scan_referensi/";

        $columnName = "";
        $pathChoosen = "";

        try {
          if($kategori=="foto"){
            $columnName = "lampiran_foto";
            $pathChoosen = $pathFoto;
          }elseif($kategori=="scanijazah"){
            $columnName = "lampiran_ijazah";
            $pathChoosen = $pathIjazah;
          }elseif($kategori=="scantranskrip"){
            $columnName = "lampiran_transkripnilai";
            $pathChoosen = $pathTranskrip;
          }
          elseif($kategori=="scanreferensi"){
            $columnName="lampiran_referensikerja";
            $pathChoosen = $pathReferensi;
          }
          $namefile = DB::select('select '.$columnName.' from md_jobseeker where users_id=:id',['id'=>\Auth::id()]);
          $namefile = $pathChoosen.$namefile[0]->$columnName;
          $path = Storage::disk('jobseeker')->path($namefile);
          return response()->file($path,["Cache-Control: no-store, no-cache, must-revalidate, max-age=0","Pragma: no-cache"]);
        } catch (\Throwable $th) {
        }
      }

//---------------------------------------------------Pelamaran Lowongan----------------------------------------------//
    public function showLowongan($id){
      if(!Gate::allows('isJobseeker')){
          abort(404,"Maaf Anda tidak memiliki akses");
      }
      $lowongan = md_lowongan_pekerjaan::find($id);
      $transLowongan = trans_lowongan_pekerjaan::where('md_lowongan_pekerjaan_id',$id)
                      ->where('users_id',\Auth::user()->id)
                      ->first();
      $status = ($transLowongan==null)?false:true;

      //$trans_lowongan = trans_lowongan_pekerjaan::all()->where('md_lowongan_pekerjaan_id',$lowongan->id);
      return view ('jobseeker.dashboard.show',compact('lowongan','id','status'));
    }

    public function subscribeLamaran(Request $request){
      $userId = \Auth::user()->id;
      $status = false;
      $transLowongan = trans_lowongan_pekerjaan::where('md_lowongan_pekerjaan_id',$request->jobid)
                      ->where('users_id',$userId)
                      ->first();

      if($transLowongan!=null){
        $transLowongan->delete();
        $transLowongan->md_lowongan_pekerjaan = $request->jobid;
        $transLowongan->users_id = $userId;
      }
      else{
        $account = new trans_lowongan_pekerjaan;
        $account->users_id = $userId;
        $account->md_lowongan_pekerjaan_id = $request->jobid;
        $account->entry_date = Carbon::today()->format('Y-m-d');
        $account->save();
        $status = true;
      }

      return redirect()->back()->with(compact('status'));
    }

    public function getCetakPdf()
    {
        $md_jobseeker = md_jobseeker::where('users_id',\Auth::user()->id)->get();
        $pendidikan=DB::table('st_jobseeker_pendidikanformal')
                ->where('user_id',\Auth::user()->id)
                ->join('st_tingkatpendidikan', 'st_jobseeker_pendidikanformal.tingkat_pendidikan', '=', 'st_tingkatpendidikan.id')
                ->select('st_jobseeker_pendidikanformal.*','st_tingkatpendidikan.strata')
                ->orderby('tingkat_pendidikan','desc')
                ->get();
        $pendidikan_bahasa=DB::table('st_jobseeker_pendidikanbahasa')
                ->where('user_id', \Auth::user()->id)
                ->join('st_bahasa','st_jobseeker_pendidikanbahasa.bahasa', '=', 'st_bahasa.id')
                ->join('st_kemampuan as st_lisan','st_jobseeker_pendidikanbahasa.kemampuan_lisan','=','st_lisan.id')
                ->join('st_kemampuan as st_tulis','st_jobseeker_pendidikanbahasa.kemampuan_tertulis','=','st_tulis.id')
                ->select('st_jobseeker_pendidikanbahasa.*',
                         'st_bahasa.deskripsi as deskripsi_bahasa',
                         'st_lisan.tingkat as tingkat_lisan',
                         'st_tulis.tingkat as tingkat_tulis')
                ->get();
        $pendidikan_nonformal=DB::table('st_jobseeker_pendidikaninformal')
                ->where('user_id', \Auth::user()->id)
                ->select('st_jobseeker_pendidikaninformal.*')
                ->get();
        $pekerjaan=DB::table('st_jobseeker_pengalamankerja')
                ->where('user_id',\Auth::user()->id)
                ->orderby('tanggal_mulai','asc')
                ->get();
        $minat=DB::table('st_jobseeker_minatkerja')
                ->join('st_bisnisperusahaan','st_jobseeker_minatkerja.bidang_bisnis','=','st_bisnisperusahaan.id')
                ->join('st_lingkungankerja','st_jobseeker_minatkerja.lingkungan_kerja', '=', 'st_lingkungankerja.id')
                ->join('st_spesialisasipekerjaan','st_jobseeker_minatkerja.spesialisasi', '=', 'st_spesialisasipekerjaan.id')
                ->join('st_posisikerja','st_jobseeker_minatkerja.posisi_kerja','=','st_posisikerja.id')
                ->join('st_leveljabatan','st_jobseeker_minatkerja.level_jabatan','=','st_leveljabatan.id')
                ->where('user_id', \Auth::user()->id)
                ->select('st_jobseeker_minatkerja.*',
                         'st_bisnisperusahaan.name as name_bidangbisnis',
                         'st_lingkungankerja.lingkungan',
                         'st_spesialisasipekerjaan.spesial',
                         'st_posisikerja.posisi',
                         'st_leveljabatan.jabatan')
                ->get();
        $pengalaman_organisasi=DB::table('st_jobseeker_pengalamanorganisasi')
                ->where('user_id', \Auth::user()->id)
                ->select('st_jobseeker_pengalamanorganisasi.*')
                ->orderby('tanggal_mulai','asc')
                ->get();
        $riwayat_penyakit=DB::table('st_jobseeker_riwayatpenyakit')
                ->select('st_jobseeker_riwayatpenyakit.*')
                ->where('user_id', \Auth::user()->id)
                ->orderby('tanggal_mulai','asc')
                ->get();
        $pdf = PDF::loadview('jobseeker.datadiri.resume',
          compact('md_jobseeker','pendidikan','pendidikan_nonformal','pendidikan_bahasa','pekerjaan',
            'minat','pengalaman_organisasi','riwayat_penyakit'))
        ->setPaper('A4', 'potrait');
        //->set_option('isHtml5ParserEnabled', TRUE);
        // ->render();
        return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;

use App\lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\md_kendaraan;
use App\tbl_ppkd;

class SPPDController extends Controller
{
    public function createPPKD(){
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
//            ->where('iskaryawan','=',1)
            ->orderBy('st_site.nama')
            ->orderBy('nama')
            ->get();
        $kendaraan = md_kendaraan::all();
        return view('sppd.create_ppkd',compact('kar','kendaraan'));
    }

    public function storePPKD(Request $request){
        $date = explode(' - ',$request->datetimes);
        $waktu_awal = $date[0];
        $waktu_akhir = $date[1];
        $user = Auth::user()->id;

        if ((count(DB::select('select * from tbl_ppkd where date(waktu_awal) = ? and karyawan_id = ?',
                    [date('Y-m-d', strtotime($waktu_awal)),$request->karyawan_id])) == 0)
            && ($waktu_awal >= date("Y-m-d H:i:s"))){
            $store = new tbl_ppkd();
            $store->karyawan_id = $request->karyawan_id;
            $store->waktu_awal = $waktu_awal;
            $store->waktu_akhir = $waktu_akhir;
            $store->keterangan = $request->keterangan;
            $store->kendaraan_id = $request->kendaraan_id;
            $store->created_at = date("Y-m-d H:i:s");
            $store->created_by = $user;
            $store->updated_at = date("Y-m-d H:i:s");
            $store->updated_by = $user;
            $store->save();
            return redirect()->back()->with('success','Pengajuan PPKD berhasil diajukan!');
        }
        else return redirect()->back()->with('failed','Maaf, Pengajuan PPKD gagal diajukan.');
    }

    public function listPPKD(){
        $ppkd = DB::table('tbl_ppkd')
            ->join('md_karyawan','tbl_ppkd.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->join('md_kendaraan','md_kendaraan.id_kendaraan','=','tbl_ppkd.kendaraan_id')
            ->where('tbl_ppkd.status','=',0)
            ->where('tbl_ppkd.deleted_at','=', (NULL))
            ->select('tbl_ppkd.*','md_karyawan.nama','st_site.nama as site','md_kendaraan.*')
            ->orderby('tbl_ppkd.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('sppd.approval_ppkd',compact('ppkd'));
    }

    public function accPPKD(Request $request){
        DB::table('tbl_ppkd')
            ->where('id','=',$request->id)
            ->update([
                'status' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Approval PPKD Berhasil!');
    }

    public function tolakPPKD(Request $request){
        DB::table('tbl_ppkd')
            ->where('id','=',$request->id)
            ->update([
                'status' => 2,
                'notes' => $request->notes,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id,
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Approval PPKD Berhasil!');
    }

    public function createSPPD(){
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('st_site.nama')
            ->orderBy('nama')
            ->get();
        return view('sppd.create_sppd', compact('kar'));
    }

    public function listSPPD(){
        $ppkd = DB::table('tbl_ppkd')
            ->join('md_karyawan','tbl_ppkd.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->join('md_kendaraan','md_kendaraan.id_kendaraan','=','tbl_ppkd.kendaraan_id')
            ->where('tbl_ppkd.status','=',0)
            ->where('tbl_ppkd.deleted_at','=', (NULL))
            ->select('tbl_ppkd.*','md_karyawan.nama','st_site.nama as site','md_kendaraan.*')
            ->orderby('tbl_ppkd.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('sppd.approval_sppd',compact('ppkd'));
    }

    public function penglemburJadwal(){
        $lembur = DB::table('lembur')
            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->where('lembur.acc','=',1)
            ->where('lembur.deleted_at','=', (NULL))
            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
            ->orderby('lembur.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('penglembur.jadwal',compact('lembur'));
    }

    public function historyJadwal(){
        $lembur = DB::table('lembur')
            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
//            ->where('lembur.acc','=',1)
            ->where('lembur.deleted_at','<>', (NULL))
            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
            ->orderby('lembur.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('penglembur.history',compact('lembur'));
    }

    public function donePenglembur($id){
        DB::table('lembur')
            ->where('id','=',$id)
            ->update([
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back();
    }
}

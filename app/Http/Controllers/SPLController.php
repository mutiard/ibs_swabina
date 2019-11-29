<?php

namespace App\Http\Controllers;

use App\lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SPLController extends Controller
{
    public function PengLembur(){
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
//            ->where('iskaryawan','=',1)
            ->orderBy('st_site.nama')
            ->orderBy('nama')
            ->get();
        return view('penglembur.index',compact('kar'));
    }

    public function storePengLembur(Request $request){
//        $kar = DB::table('user')
//            ->where('id','=',$request->id)
//            ->where('iskaryawan','=',1)
//            ->get();
        $kar = DB::table('md_karyawan')
            ->where('id','=',$request->id)
            ->get();

        $date = explode(' - ',$request->datetimes);
        $waktu_awal = $date[0];
        $waktu_akhir = $date[1];
        $user = Auth::user()->id;

        if ((count(DB::select('select * from lembur where date(waktu_awal) = ? and karyawan_id = ? and waktu_lembur = ?',
                    [date('Y-m-d', strtotime($waktu_awal)),$request->id,$request->waktu])) == 0)
            && ($waktu_awal >= date("Y-m-d H:i:s"))){
//            or ($waktu_awal >= date("Y-m-d H:i:s"))){
            $store = new lembur();
            $store->karyawan_id = $request->id;
            $store->waktu_awal = $waktu_awal;
            $store->waktu_akhir = $waktu_akhir;
            $store->waktu_lembur = $request->waktu;
            $store->keterangan = $request->keterangan;
            $store->created_at = date("Y-m-d H:i:s");
            $store->created_by = $user;
            $store->updated_at = date("Y-m-d H:i:s");
            $store->updated_by = $user;
            $store->save();

            return redirect()->back()->with('success','Permohonan Lembur berhasil diajukan!');
        }
        else return redirect()->back()->with('failed','Maaf, Permohonan Lembur gagal diajukan.');
    }

    public function pengLemburDaftar(){
        DB::table('lembur')
            ->where('waktu_akhir','<',date('Y-m-d H:i:s'))
            ->where('deleted_at','=',(NULL))
            ->update([
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id,
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        $lembur = DB::table('lembur')
            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->where('lembur.acc','=',0)
            ->where('lembur.deleted_at','=', (NULL))
            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
            ->orderby('lembur.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('penglembur.daftar',compact('lembur'));
    }

    public function accPenglembur(Request $request){
        DB::table('lembur')
            ->where('id','=',$request->id)
            ->update([
                'acc' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Approval Surat Pengajuan Lembur Berhasil!');
    }

    public function tolakPenglembur(Request $request){
        DB::table('lembur')
            ->where('id','=',$request->id)
            ->update([
                'acc' => 2,
                'notes' => $request->notes,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id,
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Approval Surat Pengajuan Lembur Berhasil!');
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

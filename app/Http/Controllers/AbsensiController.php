<?php

namespace App\Http\Controllers;

use App\tbl_pengajuan_izin;
use App\tbl_pengajuan_izin_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function getFormIzin(){
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('st_site.nama')
            ->orderBy('nama')
            ->get();
        return view('absensi.izin.index',compact('kar'));
    }

    public function absensiDaftar(){
        $absen = DB::table('tbl_pengajuan_izin')
            ->join('md_karyawan','md_karyawan.id','=','tbl_pengajuan_izin.id_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->join('st_kategori_izin','st_kategori_izin.id','tbl_pengajuan_izin.kategori')
            ->where('tbl_pengajuan_izin.deleted_at','=',(NULL))
            ->where('tbl_pengajuan_izin.acc','=',0)
            ->select('tbl_pengajuan_izin.*','md_karyawan.nama','st_site.nama as site','st_kategori_izin.nama as izin')
            ->get();
        return view('absensi.izin.daftar',compact('absen'));
    }

    public function storeAbsensi(Request $request){
        $date = explode(' - ',$request->datetimes);
        $tgl_mulai = $date[0];
        $tgl_selesai = $date[1];

        $store = new tbl_pengajuan_izin();
        $store->id_karyawan = $request->id;
        $store->tgl_pengajuan = date("Y-m-d");
        $store->tgl_mulai = $tgl_mulai;
        $store->tgl_selesai = $tgl_selesai;
        $store->tgl_batas = $tgl_selesai;
        $store->kategori = $request->kategori;
        $store->keterangan = $request->keterangan;
        $store->created_at = date("Y-m-d H:i:s");
        $store->created_by = Auth::user()->id;
        $store->updated_at = date("Y-m-d H:i:s");
        $store->updated_by = Auth::user()->id;
        $store->save();

        $notif = 'Permohonan Izin tanggal '.$tgl_mulai.' sampai '.$tgl_selesai.' berhasil diajukan!';
        return redirect()->back()->with('success',$notif);
    }

    public function accAbsensi(Request $request){
        DB::table('tbl_pengajuan_izin')
            ->where('id','=',$request->id)
            ->update([
                'acc' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        $notif = 'Approval Absen Dengan Alasan '.$request->kategori.' Berhasil!';
        return redirect()->back()->with('success',$notif);
    }

    public function tolakAbsensi(Request $request){
        $cekdone = DB::table('tbl_pengajuan_izin')
            ->where('id','=',$request->id)
            ->get();
        if (count($cekdone) > 0){
            foreach ($cekdone as $x){
                $interval = $x->tgl_mulai;
                while($interval <= $x->tgl_selesai){
                    $history = new tbl_pengajuan_izin_history();
                    $history->id_karyawan = $x->id_karyawan;
                    $history->tgl_pengajuan = $x->tgl_pengajuan;
                    $history->tgl = $interval;
                    $history->tgl_batas = $x->tgl_batas;
                    $history->kategori = $x->kategori;
                    $history->keterangan = $x->keterangan;
                    if ($x->kategori == 2 && $x->acc == 1){
                        $history->out_qty = 1;
                    }
                    $history->acc = 2;
                    $history->ket_acc = $x->ket_acc;
                    $history->created_at = date("Y-m-d H:i:s");
                    $history->created_by = Auth::user()->id;
                    $history->save();

                    $interval = date('Y-m-d', strtotime('+1 days', strtotime( $interval )));
                }
                DB::table('tbl_pengajuan_izin')
                    ->where('id','=',$x->id)
                    ->update([
                        'acc' => 2,
                        'ket_acc' => $request->keterangan,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => Auth::user()->id,
                        'deleted_at' => date("Y-m-d H:i:s"),
                        'deleted_by' => Auth::user()->id
                    ]);
            }
        }
        $notif = 'Penolakan Absen Dengan Alasan '.$request->kategori.' Berhasil!';
        return redirect()->back()->with('success',$notif);
    }

    public function absensiJadwal(){
        $cekdone = DB::table('tbl_pengajuan_izin')
            ->where('tgl_selesai','<',date('Y-m-d'))
            ->where('deleted_at','=',(NULL))
            ->get();
        if (count($cekdone) > 0){
            foreach ($cekdone as $x){
                $interval = $x->tgl_mulai;
                while($interval <= $x->tgl_selesai){
                    $history = new tbl_pengajuan_izin_history();
                    $history->id_karyawan = $x->id_karyawan;
                    $history->tgl_pengajuan = $x->tgl_pengajuan;
                    $history->tgl = $interval;
                    $history->tgl_batas = $x->tgl_batas;
                    $history->kategori = $x->kategori;
                    $history->keterangan = $x->keterangan;
                    if ($x->kategori == 2 && $x->acc == 1){
                        $history->out_qty = 1;
                    }
                    $history->acc = $x->acc;
                    $history->ket_acc = $x->ket_acc;
                    $history->created_at = date("Y-m-d H:i:s");
                    $history->created_by = Auth::user()->id;
                    $history->save();

                    $interval = date('Y-m-d', strtotime('+1 days', strtotime( $interval )));
                }
                DB::table('tbl_pengajuan_izin')
                    ->where('id','=',$x->id)
                    ->update([
                        'deleted_at' => date("Y-m-d H:i:s"),
                        'deleted_by' => Auth::user()->id
                ]);
            }
        }
        $absen = DB::table('tbl_pengajuan_izin')
            ->join('md_karyawan','md_karyawan.id','=','tbl_pengajuan_izin.id_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->join('st_kategori_izin','st_kategori_izin.id','tbl_pengajuan_izin.kategori')
            ->where('tbl_pengajuan_izin.deleted_at','=',(NULL))
            ->where('tbl_pengajuan_izin.acc','=',1)
            ->select('tbl_pengajuan_izin.*','md_karyawan.nama','st_site.nama as site','st_kategori_izin.nama as izin')
            ->get();
        return view('absensi.izin.jadwal',compact('absen'));
    }

    public function absensiHistory(){
        $cekdone = DB::table('tbl_pengajuan_izin')
            ->where('tgl_selesai','<',date('Y-m-d'))
            ->where('deleted_at','=',(NULL))
            ->get();
        if (count($cekdone) > 0){
            foreach ($cekdone as $x){
                $interval = $x->tgl_mulai;
                while($interval <= $x->tgl_selesai){
                    $history = new tbl_pengajuan_izin_history();
                    $history->id_karyawan = $x->id_karyawan;
                    $history->tgl_pengajuan = $x->tgl_pengajuan;
                    $history->tgl = $interval;
                    $history->tgl_batas = $x->tgl_batas;
                    $history->kategori = $x->kategori;
                    $history->keterangan = $x->keterangan;
                    if ($x->kategori == 2 && $x->acc == 1){
                        $history->out_qty = 1;
                    }
                    $history->acc = $x->acc;
                    $history->ket_acc = $x->ket_acc;
                    $history->created_at = date("Y-m-d H:i:s");
                    $history->created_by = Auth::user()->id;
                    $history->save();

                    $interval = date('Y-m-d', strtotime('+1 days', strtotime( $interval )));
                }
                DB::table('tbl_pengajuan_izin')
                    ->where('id','=',$x->id)
                    ->update([
                        'deleted_at' => date("Y-m-d H:i:s"),
                        'deleted_by' => Auth::user()->id
                    ]);
            }
        }
        $absen = DB::table('tbl_pengajuan_izin_history')
            ->join('md_karyawan','md_karyawan.id','=','tbl_pengajuan_izin_history.id_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->join('st_kategori_izin','st_kategori_izin.id','tbl_pengajuan_izin_history.kategori')
            ->select('tbl_pengajuan_izin_history.*','md_karyawan.nama','st_site.nama as site','st_kategori_izin.nama as izin')
            ->orderBy('tbl_pengajuan_izin_history.tgl')
            ->get();
        return view('absensi.izin.history',compact('absen'));
    }

//    public function cutiJadwal(){
//        $lembur = DB::table('lembur')
//            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
//            ->join('st_site','st_site.id','=','md_karyawan.site_id')
//            ->where('lembur.acc','=',1)
//            ->where('lembur.deleted_at','=', (NULL))
//            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
//            ->orderby('lembur.waktu_awal')
//            ->orderby('md_karyawan.nama')
//            ->get();
//        return view('izin.jadwal',compact('lembur'));
//    }
//
//    public function historyJadwal(){
//        $lembur = DB::table('lembur')
//            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
//            ->join('st_site','st_site.id','=','md_karyawan.site_id')
////            ->where('lembur.acc','=',1)
//            ->where('lembur.deleted_at','<>', (NULL))
//            ->where('md_karyawan.id','=',7)
//            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
//            ->orderby('lembur.waktu_awal')
//            ->orderby('md_karyawan.nama')
//            ->get();
//        return view('izin.history',compact('lembur'));
//    }
}

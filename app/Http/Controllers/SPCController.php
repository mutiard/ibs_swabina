<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPCController extends Controller
{
    public function getCuti(){
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->select('md_karyawan.*','st_site.nama as site')
//            ->where('iskaryawan','=',1)
            ->orderBy('st_site.nama')
            ->orderBy('nama')
            ->get();
        return view('cuti.index',compact('kar'));
    }

    public function cutiDaftar(){
        $lembur = DB::table('lembur')
            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->where('lembur.acc','=',0)
            ->where('lembur.deleted_at','=', (NULL))
            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
            ->orderby('lembur.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('cuti.daftar',compact('lembur'));
    }

    public function cutiJadwal(){
        $lembur = DB::table('lembur')
            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->where('lembur.acc','=',1)
            ->where('lembur.deleted_at','=', (NULL))
            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
            ->orderby('lembur.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('cuti.jadwal',compact('lembur'));
    }

    public function historyJadwal(){
        $lembur = DB::table('lembur')
            ->join('md_karyawan','lembur.karyawan_id','=','md_karyawan.id')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
//            ->where('lembur.acc','=',1)
            ->where('lembur.deleted_at','<>', (NULL))
            ->where('md_karyawan.id','=',7)
            ->select('lembur.*','md_karyawan.nama','st_site.nama as site')
            ->orderby('lembur.waktu_awal')
            ->orderby('md_karyawan.nama')
            ->get();
        return view('cuti.history',compact('lembur'));
    }
}

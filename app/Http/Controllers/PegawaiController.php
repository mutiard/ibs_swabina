<?php

namespace App\Http\Controllers;

use App\md_karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function getPegawai(){
        $kar = DB::table('md_karyawan')
            ->join('st_site','st_site.id','=','md_karyawan.site_id')
            ->where('md_karyawan.deleted_at','=',(NULL))
            ->select('md_karyawan.*','st_site.nama as site')
            ->orderBy('nama')
            ->orderBy('site_id')
            ->get();
        $site = DB::table('st_site')
            ->where('deleted_at','=',(NULL))
            ->get();
        return view('pegawai.index', compact('kar','site'));
    }

    public function tambahPegawai(Request $request){
        $kar = new md_karyawan();
        $kar->nik = $request->nik;
        $kar->nama = $request->nama;
        $kar->site_id = $request->site;
        $kar->no_tlp = $request->tlp;
        $kar->email = $request->email;
        $kar->alamat = $request->alamat;
        $kar->created_at = date("Y-m-d H:i:s");
        $kar->created_by = Auth::user()->id;
        $kar->save();
        return redirect()->back()->with('success','Tambah Data Pegawai Berhasil!');
    }

    public function updatePegawai(Request $request){
        $site = DB::table('st_site')
            ->where('nama','=',$request->site)
            ->get();
        DB::table('md_karyawan')
            ->where('id','=',$request->id)
            ->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'site_id' => $site[0]->id,
                'email' => $request->email,
                'no_tlp' => $request->tlp,
                'alamat' => $request->alamat,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Update Data Pegawai Berhasil!');
    }

    public function deletePegawai(Request $request){
        DB::table('md_karyawan')
            ->where('id','=',$request->id)
            ->update([
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Delete Data Pegawai Berhasil!');
    }
}

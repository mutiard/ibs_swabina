<?php

namespace App\Http\Controllers;

use App\schclass;
use App\schpola_dtl;
use App\st_site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    public function setup_komponen_gaji(){
        $setup_komponen_gaji = DB::select(DB::raw("SELECT * FROM st_komponen_gaji"));
        return view('setup_komponen_gaji', compact('setup_komponen_gaji'));
    }

    public function simpan_komponen_gaji(Request $request){
        $simpan_komponen_gaji = DB::table('st_komponen_gaji')
            ->insert([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
            ]);
        return redirect()->back();
    }

    public function edit_komponen_gaji(Request $request){
        $edit_komponen_gaji = DB::table('st_komponen_gaji')
            ->where('id','=',$request->id)
            ->update([
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
            ]);
        return redirect()->back();
    }

    public function delete_komponen_gaji(Request $request){
        //dd($request);
        $delete_komponen_gaji = DB::select(DB::raw("DELETE FROM st_komponen_gaji where id = '$request->id'"));
        return redirect()->back();
    }

    public function setup_periode_gaji(){
        $setup_periode_gaji = DB::select(DB::raw("SELECT * FROM st_periode_gaji"));
        return view('setup_periode_gaji', compact('setup_periode_gaji'));
    }

    public function simpan_periode_gaji(Request $request){
        $simpan_periode_gaji = DB::table('st_periode_gaji')
            ->insert([
                'tgl_gaji' => $request->tgl_gaji,
                'sd_prd_kerja' => $request->sd_prd_kerja,
                'ed_prd_kerja' => $request->ed_prd_kerja,
                'selisih_bln_kerja' => $request->selisih_bln_kerja,
            ]);
        return redirect()->back();
    }

    public function setupSite(){
        $site = DB::table('st_site')
            ->where('deleted_at','=',(NULL))
            ->get();
        return view('setup.site.index', compact('site'));
    }

    public function setupSiteUpdate(Request $request){
        DB::table('st_site')
            ->where('id','=',$request->id)
            ->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'email' => $request->email,
                'no_tlp' => $request->tlp,
                'alamat' => $request->alamat,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Update Data Site Berhasil!');
    }

    public function setupSiteDelete(Request $request){
        DB::table('st_site')
            ->where('id','=',$request->id)
            ->update([
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Delete Data Site Berhasil!');
    }

    public function setupSiteTambah(Request $request){
        $site = new st_site();
        $site->nama = $request->nama;
        $site->deskripsi = $request->deskripsi;
        $site->email = $request->email;
        $site->no_tlp = $request->tlp;
        $site->alamat = $request->alamat;
        $site->created_at = date("Y-m-d H:i:s");
        $site->created_by = Auth::user()->id;
        $site->save();
        return redirect()->back()->with('success','Tambah Data Site Berhasil!');
    }

    public function setupPola(){
        $pola = DB::table('schpola_dtl')
            ->join('schpola_hdr','schpola_hdr.kode','=','schpola_dtl.polaid')
            ->where('schpola_dtl.deleted_by','=',0)
            ->select('schpola_dtl.*','schpola_hdr.deskripsi as desk')
            ->orderBy('schpola_hdr.deskripsi')
            ->orderBy('schpola_dtl.hari_ke')
            ->get();
        $class = DB::table('schclass')->get();
        $polahdr = DB::table('schpola_hdr')->get();
        return view('setup.pola.index', compact('pola','class','polahdr'));
    }

    public function setupPolaUpdate(Request $request){
        DB::table('schpola_dtl')
            ->where('polaid','=',$request->id)
            ->where('hari_ke','=',$request->hari)
            ->update([
                'polaid' => $request->id,
                'hari_ke' => $request->hari,
                'schclass_id' => $request->kelas,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Update Data Pola Berhasil!');
    }

    public function setupPolaDelete(Request $request){
        DB::table('schpola_dtl')
            ->where('id','=',$request->id)
            ->update([
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Delete Data Pola Berhasil!');
    }

    public function setupPolaTambah(Request $request){
        if(count(DB::table('schpola_dtl')->where('polaid','=',$request->desk)->get()) == 0){
            for ($i=1;$i<=7;$i++){
                $new = new schpola_dtl();
                $new->polaid = $request->desk;
                $new->hari_ke = $i;
                $new->schclass_id = $request->$i;
                $new->entry_date = date("Y-m-d H:i:s");
                $new->entry_user = Auth::user()->id;
                $new->save();
            }
            return redirect()->back()->with('success','Data Pola Berhasil Ditambahkan!');
        }
        else return redirect()->back()->with('failed','Data Pola Sudah Ada!');
    }

    public function setupSchPola(){
        $class = DB::table('schclass')->where('deleted_at','=',(NULL))->get();
        return view('setup.polaclass.index', compact('class'));
    }

    public function setupSchPolaUpdate(Request $request){
        DB::table('schclass')
            ->where('kode','=',$request->kode)
            ->update([
                'kode' => $request->kode,
                'deskripsi' => $request->desk,
                'stime' => $request->stime,
                'etime' => $request->etime,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Update Data Pola Class Berhasil!');
    }

    public function setupSchPolaDelete(Request $request){
        DB::table('schclass')
            ->where('kode','=',$request->kode)
            ->update([
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => Auth::user()->id
            ]);
        return redirect()->back()->with('success','Delete Data Pola Class Berhasil!');
    }

    public function setupSchPolaTambah(Request $request){
        $new = new schclass();
        $new->kode = $request->kode;
        $new->deskripsi = $request->desk;
        $new->stime = $request->stime;
        $new->etime = $request->etime;
        $new->entry_date = date("Y-m-d H:i:s");
        $new->entry_user = Auth::user()->id;
        $new->save();
        return redirect()->back()->with('success','Data Pola Class Berhasil Ditambahkan!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\JobseekerImport;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Database\QueryException;
use App\md_jobseeker;
use App\tbl_permintaan_tenaga_kerja;
use App\st_Tingkatpendidikan;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_datakeluarga;
use App\st_jobseeker_susunankeluarga;
use App\User;
use App\st_Kabkota;
use App\st_Kecamatan;
use Carbon\Carbon;
use Excel;
// use App\md_client;
// use App\md_karyawan;

class UnitKerjaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permintaan = tbl_permintaan_tenaga_kerja::all();
        return view('unit_kerja.index_permintaan_tenaga_kerja', compact('permintaan'));
    }

    public function create()
    {
        return view('unit_kerja.form_tambah_permintaan_tenaga_kerja');
    }

    public function show($id){
        $permintaan = tbl_permintaan_tenaga_kerja::findorFail($id);
        return view('unit_kerja.show_permintaan_tenaga_kerja', compact('permintaan'));
    }

    function generateIdPermintaan()
    {
        $last_id = tbl_permintaan_tenaga_kerja::orderBy('id_permintaan', 'desc')->first();

        if(isset($last_id)){
            if (substr($last_id->id_permintaan, -2, 1) == 0) {
                $next_id_number = substr($last_id->id_permintaan, -1, 1) + 1;
                if($next_id_number == 10){

                    $number = '0'.$next_id_number;
                }else{

                    $number = '00'.$next_id_number;
                }
            } elseif (substr($last_id->id_permintaan, -3, 1) == 0) {
                $next_id_number = substr($last_id->id_permintaan, -2, 2) + 1;
                if($next_id_number == 100){

                    return redirect()->back() ->with('alert', 'permintaan sudah penuh');
                }else{

                    $number = '0'.$next_id_number;
                }
            } 
        }
        else{
            $last_id='';
            $number='001';
        }
        // dd($number);

        $id = $number;
        if ($this->IdPermintaanExists($id)) {
            return $this->generateIdPermintaan();
        }

        return $id;
    }

    function IdPermintaanExists($id)
    {
        return tbl_permintaan_tenaga_kerja::whereIdPermintaan($id)->exists();
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $permintaan = new tbl_permintaan_tenaga_kerja();
        $permintaan->id_permintaan = $this->generateIdPermintaan();
        $permintaan->tanggal_permintaan = $request->tanggal_permintaan;
        $permintaan->tanggal_dibutuhkan = $request->tanggal_dibutuhkan;
        $permintaan->jumlah_tenaga_kerja = $request->jumlah_yg_dibutuhkan;
        $permintaan->jabatan = $request->jabatan;
        $permintaan->status_tambahan = $request->tambahan;
        $permintaan->status_tetap = $request->tetap;
        $permintaan->status_pria = $request->pria;
        $permintaan->status_jam_kerja_biasa_pria = $request->jam_kerja_biasa_pria;
        $permintaan->status_penggantian = $request->penggantian;
        $permintaan->status_sementara = $request->sementara;
        $permintaan->status_wanita = $request->wanita;
        $permintaan->status_jam_kerja_biasa_wanita = $request->jam_kerja_biasa_wanita;
        $permintaan->status_malam_wanita = $request->malam_wanita;
        $permintaan->status_min = $request->min;
        $permintaan->status_max = $request->max;
        $permintaan->status_sltp = $request->sltp;
        $permintaan->status_slta = $request->slta;
        $permintaan->status_akademis = $request->akademis;
        $permintaan->status_sarjana = $request->sarjana;
        $permintaan->waktu_sementara = $request->waktu_sementara;
        $permintaan->nama_pengganti = $request->nama_pengganti;
        $permintaan->alasan_tambahan_penggantian = $request->alasan_tambahan_penggantian;
        $permintaan->syarat_pendidikan_khusus = $request->syarat_pendidikan_khusus;
        $permintaan->syarat_lain = $request->syarat_lain;
        $permintaan->alasan_cocok = $request->alasan_cocok;
        $permintaan->catatan = $request->catatan;
        $permintaan->diminta_oleh = $request->diminta_oleh;
        $permintaan->diketahui_oleh = $request->diketahui_oleh;
        $permintaan->disetujui_oleh = $request->disetujui_oleh;
        $permintaan->save();

        return redirect()->back()->with('status', 'Berhasil!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\JobseekerImport;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Database\QueryException;
use App\md_jobseeker;
use App\md_karyawan;
use App\md_karyawan_penilaian;
use App\md_user;
use App\tbl_sanksi_pegawai;
use App\st_Tingkatpendidikan;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_datakeluarga;
use App\st_jobseeker_susunankeluarga;
use App\User;
use App\st_Kabkota;
use App\st_periode_nilai;
use Excel;
// use App\md_client;
// use App\md_karyawan;

class PenilaianController extends Controller
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
    //Atasan
    public function data_karyawan(){
        $periode = st_periode_nilai::all();
        $data_karyawan = DB::select(DB::raw("SELECT * FROM user where iskaryawan = 1"));
        return view('penilaian_pegawai.penilaian_data_karyawan', compact('data_karyawan','periode'));
    }

    public function create_penilaian($id){
        $periode = st_periode_nilai::where('status_aktif',1)->get();
        $data_karyawan = md_user::findOrFail($id);
        return view('penilaian_pegawai.create_penilaian_pegawai', compact('data_karyawan','periode'));
    }

    public function store_penilaian(Request $request, $id){
        // dd($request->all());
        $nilai = new md_karyawan_penilaian();
        $nilai->id_karyawan = $id;
        $nilai->id_periode = $request->periode;
        $nilai->nilai_disiplin = $request->nilai_disiplin;
        $nilai->nilai_tanggung_jawab = $request->nilai_tanggung_jawab;
        $nilai->nilai_kejujuran = $request->nilai_kejujuran;
        $nilai->nilai_loyalitas = $request->nilai_loyalitas;
        $nilai->nilai_inisiatif_kreativitas = $request->nilai_inisiatif_kreativitas;
        $nilai->nilai_kecakapan_keterampilan = $request->nilai_kecakapan_keterampilan;
        $nilai->nilai_hubungan_kerjasama = $request->nilai_hubungan_kerjasama;
        $nilai->nilai_pengamanan_lingkungan = $request->nilai_pengamanan_lingkungan;
        $nilai->nilai_kepemimpinan = $request->nilai_kepemimpinan;
        $nilai->spesifikasi_pendidikan = $request->spesifikasi_pendidikan;
        $nilai->nilai_spesifikasi_pendidikan = $request->nilai_spesifikasi_pendidikan;
        $nilai->spesifikasi_pengalaman = $request->spesifikasi_pengalaman;
        $nilai->nilai_spesifikasi_pengalaman = $request->nilai_spesifikasi_pengalaman;
        $nilai->spesifikasi_pelatihan = $request->spesifikasi_pelatihan;
        $nilai->nilai_spesifikasi_pelatihan = $request->nilai_spesifikasi_pelatihan;
        $nilai->spesifikasi_keterampilan = $request->spesifikasi_keterampilan;
        $nilai->nilai_spesifikasi_keterampilan = $request->nilai_spesifikasi_keterampilan;
        $nilai->kesimpulan_saran = $request->kesimpulan_saran;
        $nilai->catatan_personalia = $request->catatan_personalia;
        $nilai->save();
        return redirect()->route('penilaian_datakaryawan');
    }

    //Hubnaker
    public function periode_penilaian(){
        $periode = st_periode_nilai::all();
        return view('penilaian_pegawai.setup_periode_penilaian_pegawai', compact('periode'));
    }

    public function store_periode_penilaian(Request $request){
        // dd($request->all());
        $periode = new st_periode_nilai();
        $periode->e_bulan = $request->e_bulan;
        $periode->s_bulan = $request->s_bulan;
        $periode->tahun = $request->tahun;
        $periode->save();
        return redirect()->back();
    }

    public function statusActive(Request $request, $id) 
    {
        // dd($id);
        st_periode_nilai::where('id_periode_nilai',$id)->update(array(
            'status_aktif'=>1
        ));

        return redirect()->back();
    }

    public function statusNotActive(Request $request, $id) 
    {
        st_periode_nilai::where('id_periode_nilai',$id)->update(array(
            'status_aktif'=>0
        ));

        return redirect()->back();
    }

    public function histori_penilaian(){
        $data_karyawan = DB::select(DB::raw("SELECT * FROM user where iskaryawan = 1"));
        return view('penilaian_pegawai.penilaian_data_karyawan_histori', compact('data_karyawan'));
    }

    public function detail_penilaian($id){
        $periode = st_periode_nilai::all();
        $data_karyawan = md_user::findOrFail($id);
        return view('penilaian_pegawai.detail_penilaian_pegawai', compact('data_karyawan','periode'));
    }

    public function getDataPenilaian(Request $request) {
        $nilai = DB::select('select * from md_karyawan_penilaian where id_karyawan = ? and id_periode = ?', [$request->id_karyawan, $request->id_periode]);
        return response()->json($nilai, 200);
    }

    public function data_sanksi_pegawai(){
        $sp = tbl_sanksi_pegawai::join('user','user.id','=','tbl_sanksi_pegawai.id_karyawan')->get();
        return view('penilaian_pegawai.data_sanksi_pegawai', compact('sp'));
    }

    public function create_sanksi_pegawai(){
        $data_karyawan = md_user::where('iskaryawan',1)->get();
        return view('penilaian_pegawai.create_sanksi_pegawai', compact('data_karyawan'));
    }

    public function store_sanksi_pegawai(Request $request){
        // dd($request->all());
        $sp = new tbl_sanksi_pegawai();
        $sp->jenis_sp = $request->jenis_sp;
        $sp->id_karyawan = $request->id_karyawan;
        $sp->alasan_sp = $request->alasan_sp;
        $sp->tanggal_mulai = $request->tanggal_mulai;
        $sp->tanggal_selesai = $request->tanggal_selesai;
        $sp->save();
        return redirect()->route('data_sanksi_pegawai');
    }
}

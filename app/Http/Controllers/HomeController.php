<?php

namespace App\Http\Controllers;

use App\Imports\JobseekerImport;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Database\QueryException;
use App\md_jobseeker;
use App\md_karyawan;
use App\md_user;
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
use App\st_site;
use Excel;
// use App\md_client;
// use App\md_karyawan;

class HomeController extends Controller
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
        return view('dashboard');
    }

    public function cetakPdf()
    {
        //$md_client = md_client::all();
        //$md_karyawan = md_karyawan::all();
        $pdf = PDF::loadview('cetakpdf')
        ->setPaper('A4', 'potrait');
        //->set_option('isHtml5ParserEnabled', TRUE);
        // ->render();
        return $pdf->stream();
    }

    public function basicform()
    {
        return view('basicform');
    }

    //APD
    public function data_karyawan(){
        $data_karyawan = DB::select(DB::raw("SELECT * FROM user where iskaryawan = 1 and status_apd = 0"));
        return view('data_karyawan', compact('data_karyawan'));
    }

    public function edit_karyawan($id){
        $karyawan = md_user::findorFail($id);
        return view('edit_karyawan', compact('karyawan'));
    }

    public function update_karyawan(Request $request, $id){
        // dd($request->all());
        md_user::where('id',$id)->update(array(
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'ukuran_baju' => $request->ukuran_baju,
            'ukuran_celana' => $request->ukuran_celana,
            'ukuran_sepatu' => $request->ukuran_sepatu
        ));
        return redirect('datakaryawan')->with('info','Data Karyawan berhasil diubah');
    }

    public function pengajuanAPD(Request $request, $id)
    {
        md_user::where('id',$id)->update(array(
            'status_apd'=>1
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function terimaPengajuanAPD(Request $request, $id)
    {
        md_user::where('id',$id)->update(array(
            'status_apd'=>2
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function tolakPengajuanAPD(Request $request, $id)
    {
        md_user::where('id',$id)->update(array(
            'status_apd'=>0
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function approvePengajuanAPD(Request $request, $id)
    {
        md_user::where('id',$id)->update(array(
            'status_apd'=>3
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function daftar_pengajuan(){
        $data_karyawan = DB::select(DB::raw("SELECT * FROM user where iskaryawan = 1 and status_apd = 1"));
        return view('pengajuan_penggantian_apd', compact('data_karyawan'));
    }

    public function serah_terima(){
        $data_karyawan = DB::select(DB::raw("SELECT * FROM user where iskaryawan = 1 and status_apd = 2"));
        return view('serah_terima_apd', compact('data_karyawan'));
    }
    //PAYROLL

    public function data_payroll(){
        $data_payroll = DB::table('tbl_gaji_hdr')
                            ->join('md_karyawan','tbl_gaji_hdr.md_karyawan_id','=','md_karyawan.id')
                            ->join('st_periode_gaji','tbl_gaji_hdr.st_prd_gaji_id','=','st_periode_gaji.id')
                            ->select('tbl_gaji_hdr.*',
                                     'md_karyawan.nama as nama_karyawan',
                                     'st_periode_gaji.*',
                                     'tbl_gaji_hdr.id as id_hdr',
                                     DB::raw('SUM(md_karyawan.gp + md_karyawan.tunj_transport + md_karyawan.tunj_makan) as total_gaji'))
                            ->groupby('tbl_gaji_hdr.id')
                            ->get();
        //dd($data_payroll);
        return view('data_payroll', compact('data_payroll'));
    }

    public function print_data_payroll($id){
        $tbl_gaji_hdr = DB::table('tbl_gaji_hdr')
                            ->join('tbl_gaji_dtl','tbl_gaji_hdr.id','=','tbl_gaji_dtl.tbl_gaji_hdr_id')
                            ->join('md_karyawan','tbl_gaji_hdr.md_karyawan_id','=','md_karyawan.id')
                            ->join('st_periode_gaji','tbl_gaji_hdr.st_prd_gaji_id','=','st_periode_gaji.id')
                            ->where('tbl_gaji_hdr.id','=', $id)
                            ->select('tbl_gaji_hdr.*',
                                     'md_karyawan.nama as nama_karyawan',
                                     'st_periode_gaji.*',
                                     DB::raw('SUM(nominal_komponen_gaji) as total_gaji'))
                            ->groupby('tbl_gaji_hdr.id')
                            ->get();
        $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                            ->join('tbl_gaji_hdr','tbl_gaji_dtl.tbl_gaji_hdr_id','=','tbl_gaji_hdr.id')
                            ->join('st_komponen_gaji','tbl_gaji_dtl.kode_komponen_gaji_id','=','st_komponen_gaji.id')
                            ->where('tbl_gaji_dtl.tbl_gaji_hdr_id','=', $id)
                            ->select('tbl_gaji_dtl.*',
                                     'st_komponen_gaji.deskripsi as des_komponen_gaji')
                            ->get();

        //dd($tbl_gaji_hdr, $tbl_gaji_dtl);

        return view('print_data_payroll', compact('tbl_gaji_hdr','tbl_gaji_dtl'));
    }

    public function generate_payroll(){
        $setup_periode_gaji = DB::select(DB::raw("SELECT * FROM st_periode_gaji"));
        return view('generate_payroll', compact('setup_periode_gaji'));
    }

    public function simpan_generate_payroll(Request $request){
      //dd($request);
      DB::beginTransaction();
      try {

          $md_karyawan = DB::table('md_karyawan')->select('md_karyawan.*')->get();
          $arr_karyawan = array();
          foreach ($md_karyawan as $r) {
                $arr_karyawan[] = (array) $r;
            }
            $i=0;
          foreach ($arr_karyawan as $key) {
              $karyawan_id = $arr_karyawan[$i]['id'];
              $tbl_gaji_hdr = DB::table('tbl_gaji_hdr')
                                ->insert([
                                    'kode_gaji' => $arr_karyawan[$i]['nik'].".".substr($request->tgl_gaji, 5, -3).".".substr($request->tgl_gaji, 0, -6),
                                    'md_karyawan_id' => $arr_karyawan[$i]['id'],
                                    'st_prd_gaji_id' => $request->id,
                                    'nik' => $arr_karyawan[$i]['nik'],
                                ]);

              $id_gaji_hdr = DB::table('tbl_gaji_hdr')->orderby('tbl_gaji_hdr.id','desc')->first();
              //dd($id_gaji_hdr);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 1,
                                    'nominal_komponen_gaji' => $arr_karyawan[$i]['gp'],
                                ]);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 2,
                                    'nominal_komponen_gaji' => $arr_karyawan[$i]['tunj_transport'],
                                ]);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 3,
                                    'nominal_komponen_gaji' => $arr_karyawan[$i]['tunj_makan'],
                                ]);
              $tbl_gaji_dtl = DB::table('tbl_gaji_dtl')
                                ->insert([
                                    'tbl_gaji_hdr_id' => $id_gaji_hdr->id,
                                    'kode_komponen_gaji_id' => 4,
                                    'nominal_komponen_gaji' => 0,
                                ]);

              $i++;
          }

          DB::commit();
          return redirect()->back();
      } catch (\Exception $e) {
          DB::rollback();
          //dd($e);
          return redirect()->back();
      }

    }

    public function index_pegawai()
    {
        $jobseeker = md_jobseeker::where('status_diterima','!=','0')
            ->where('status_diterima','!=','1')
            ->where('status_diterima','!=','7')
            ->get();
        $site = st_site::all();
        return view('admin.index_data_pegawai', compact('jobseeker','site'));
    }

    public function index_pelamar()
    {
        $jobseeker = md_jobseeker::all();
        return view('admin.index_data_pelamar', compact('jobseeker'));
    }

    public function tambah_pegawai()
    {
        $kabkota = st_Kabkota::all();
        $kecamatan = st_Kecamatan::all();
        // dd($kecamatan);
        $tingkat_pendidikan = st_Tingkatpendidikan::all();
        return view('admin.form_tambah_data_pegawai',compact('kabkota','kecamatan','tingkat_pendidikan'));
    }

    public function getKecamatan($id) {
        $kecamatan = st_Kecamatan::where('regency_id', '=', $id)->get();
        return response()->json($kecamatan, 200);
    }

    public function store_pegawai(Request $request)
    {
        // dd($request->all());
        $user = new User;
        $user->email = $request->input('email');
        $user->name = $request->input('nama');
        $user->password = \Hash::make('111111');
        $user->save();

        $jobseeker = new md_jobseeker;
        $jobseeker->users_id = $user->id;
        $jobseeker->email = $request->input('email');
        $jobseeker->nama_lengkap = $request->input('nama');
        $jobseeker->tempat_lahir = $request->input('tempat_lahir');
        $jobseeker->tanggal_lahir = $request->input('tgl_lahir');
        $jobseeker->NIK = $request->input('nik');
        $jobseeker->jenis_kelamin = $request->input('jenis_kelamin');
        $jobseeker->agama = $request->input('agama');
        $jobseeker->alamat_ktp = $request->input('dusun').' RT '.$request->input('rt').' /RW '.$request->input('rw').', '.$request->input('desa');
        $jobseeker->kabkota_ktp = $request->input('kota');
        $jobseeker->kecamatan_ktp = $request->input('kec');
        $jobseeker->nohp = $request->input('no_hp');
        $jobseeker->alasan_melamar = $request->input('alasan_melamar');
        $jobseeker->radio_bersedia_sift = $request->input('radio_bersedia_sift');
        $jobseeker->alasan_sift = $request->input('alasan_sift');
        $jobseeker->radio_bersedia_mutasi = $request->input('radio_bersedia_mutasi');
        $jobseeker->alasan_mutasi = $request->input('alasan_mutasi');
        $jobseeker->save();

        if($request->tingkat_pendidikan[0] != null){
            foreach($request->tingkat_pendidikan as $key => $value){
                $pendidikan_formal = new st_jobseeker_pendidikanformal();
                $pendidikan_formal->user_id = $user->id;
                $pendidikan_formal->tingkat_pendidikan = $request->tingkat_pendidikan[$key];
                $pendidikan_formal->nama_sekolah = $request->nama_sekolah[$key];
                $pendidikan_formal->id_kabkota = $request->kota_pendidikan[$key];
                $pendidikan_formal->jurusan = $request->jurusan_pendidikan[$key];
                $pendidikan_formal->keterangan = $request->lulus[$key];
                $pendidikan_formal->tahun_lulus = $request->tahun_lulus_pendidikan[$key];
                $pendidikan_formal->kelas_terakhir = $request->kelas_terakhir_pendidikan[$key];
                $pendidikan_formal->save();
            }
        }

        if($request->nama_kursus[0] != null){
                foreach($request->nama_kursus as $key => $value){
                $pendidikan_informal = new st_jobseeker_pendidikaninformal();
                $pendidikan_informal->user_id = $user->id;
                $pendidikan_informal->nama_kursus = $request->nama_kursus[$key];
                $pendidikan_informal->nama_lembaga = $request->nama_lembaga_kursus[$key];
                $pendidikan_informal->id_kabkota = $request->kota_kursus[$key];
                $pendidikan_informal->tahun_lulus = $request->tahun_lulus_kursus[$key];
                $pendidikan_informal->lama_pendidikan = $request->lama_pendidikan_kursus[$key];
                $pendidikan_informal->save();
            }
        }
        if($request->nama_perusahaan_riwayat[0] != null){
            foreach($request->nama_perusahaan_riwayat as $key => $value){
                $kerja = new st_jobseeker_pengalamankerja();
                $kerja->user_id = $user->id;
                $kerja->nama_perusahaan = $request->nama_perusahaan_riwayat[$key];
                $kerja->alamat_perusahaan = $request->alamat_perusahaan_riwayat[$key];
                $kerja->jabatan = $request->jabatan_perusahaan_riwayat[$key];
                $kerja->alasan_pindah = $request->alasan_berhenti_perusahaan_riwayat[$key];
                $kerja->bulan_masuk = $request->bulan_masuk_pekerjaan_riwayat[$key];
                $kerja->bulan_keluar = $request->bulan_keluar_pekerjaan_riwayat[$key];
                $kerja->tahun_masuk = $request->tahun_masuk_pekerjaan_riwayat[$key];
                $kerja->tahun_keluar = $request->tahun_keluar_pekerjaan_riwayat[$key];
                $kerja->save();
            }
        }

        if($request->nama_organisasi[0] != null){
            foreach($request->nama_organisasi as $key => $value){
                $organisasi = new st_jobseeker_pengalamanorganisasi();
                $organisasi->user_id = $user->id;
                $organisasi->organisasi = $request->nama_organisasi[$key];
                $organisasi->jenis_organisasi = $request->jenis_organisasi[$key];
                $organisasi->jabatan = $request->jabatan_organisasi[$key];
                $organisasi->tahun = $request->tahun_organisasi[$key];
                $organisasi->save();
            }
        }

        if($request->nama_keluarga[0] != null){
            foreach($request->nama_keluarga as $key => $value){
                $data_keluarga = new st_jobseeker_datakeluarga();
                $data_keluarga->user_id = $user->id;
                $data_keluarga->nama_anggota_keluarga = $request->nama_keluarga[$key];
                $data_keluarga->hubungan_keluarga = $request->hubungan_keluarga[$key];
                $data_keluarga->jenis_kelamin = $request->jenis_kelamin_keluarga[$key];
                $data_keluarga->tempat_lahir = $request->tempat_lahir_keluarga[$key];
                $data_keluarga->tanggal_lahir = $request->tgl_lahir_keluarga[$key];
                $data_keluarga->bekerja = $request->bekerja_keluarga[$key];
                $data_keluarga->save();
            }
        }

        if($request->nama_susunan_keluarga[0] != null){
            foreach($request->nama_susunan_keluarga as $key => $value){
                $susunan_keluarga = new st_jobseeker_susunankeluarga();
                $susunan_keluarga->user_id = $user->id;
                $susunan_keluarga->nama_anggota_keluarga = $request->nama_susunan_keluarga[$key];
                $susunan_keluarga->keanggotaan = $request->anggota_keluarga[$key];
                $susunan_keluarga->jenis_kelamin = $request->jenis_kelamin_susunan_keluarga[$key];
                $susunan_keluarga->usia = $request->usia_susunan_keluarga[$key];
                $susunan_keluarga->pendidikan = $request->pendidikan_susunan_keluarga[$key];
                $susunan_keluarga->pekerjaan = $request->pekerjaan_susunan_keluarga[$key];
                $susunan_keluarga->perusahaan = $request->perusahaan_susunan_keluarga[$key];
                $susunan_keluarga->save();
            }
        }

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function import_excel(Request $request) {
        try {
            Excel::import(new JobseekerImport(), request()->file('file'));
        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                return redirect()->route('pegawai.index')
                ->with(['error' => 'Data gagal diimport! Pastikan kode registrasi sudah terdaftar']);
            } else {
                return redirect()->route('pegawai.index')
                ->with(['error' => 'Data gagal diimport']);
            }
        }

        return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil diimport']);
    }

    public function detail_pelamar($id){
        $jobseeker = md_jobseeker::findorFail($id);
        $pendidikan_formal = st_jobseeker_pendidikanformal::where('user_id',$id)->get();
        $pendidikan_informal = st_jobseeker_pendidikaninformal::where('user_id',$id)->get();
        $kerja = st_jobseeker_pengalamankerja::where('user_id',$id)->get();
        $organisasi = st_jobseeker_pengalamanorganisasi::where('user_id',$id)->get();
        $data_keluarga = st_jobseeker_datakeluarga::where('user_id',$id)->get();
        $susunan_keluarga = st_jobseeker_susunankeluarga::where('user_id',$id)->get();
        // dd($pendidikan_formal);
        return view('admin.show_data_pegawai', compact('jobseeker','pendidikan_formal','pendidikan_informal','kerja','organisasi','data_keluarga','susunan_keluarga'));
    }

    public function terima_pelamar(Request $request, $id)
    {
        // dd($request->all());
        $jobseeker = md_jobseeker::findorFail($id);
        $users = User::where('id',$jobseeker->users_id)->first();
        $email = $users->email;
        $email_array = explode('@',$email);

        md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>7
            ));

        $karyawan = new md_karyawan();
        $karyawan->nik = $jobseeker->NIK;
        $karyawan->nama = $jobseeker->nama_lengkap;
        $karyawan->gp = '3800000';
        $karyawan->tunj_transport = '600000';
        $karyawan->tunj_makan = '500000';
        $karyawan->site_id = $request->site;
        $karyawan->save();

        $user = new md_user();
        $user->username = $email_array[0].'123';
        $user->email = $email;
        $user->nama = $jobseeker->nama_lengkap;
        $user->no_ktp = $jobseeker->NIK;
        $user->alamat = $jobseeker->alamat_ktp;
        $user->tempat_lahir = $jobseeker->tempat_lahir;
        $user->tanggal_lahir = $jobseeker->tanggal_lahir;
        $user->jenis_kelamin = $jobseeker->jenis_kelamin;
        $user->agama = $jobseeker->agama;
        $user->save();

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function terima_pelamar_wawancara(Request $request, $id)
    {
        md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>3
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function terima_pelamar_bidang(Request $request, $id)
    {
        md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>4
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function terima_pelamar_psikologi(Request $request, $id)
    {
        md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>5
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function terima_pelamar_kesehatan(Request $request, $id)
    {
        md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>6
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function tolak_pelamar(Request $request, $id)
    {
        md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>0
            ));

        return redirect()->back()->with('status', 'Berhasil!');
    }

    public function index_pelamar_lulus()
    {
        $jobseeker = md_jobseeker::where('status_diterima','=','7')->get();
        return view('admin.index_pelamar_lulus', compact('jobseeker'));
    }

    public function verifikasi_pelamar($id)
    {
        $jobseeker = md_jobseeker::findorFail($id);
        return view('admin.verifikasi_pelamar', compact('jobseeker'));
    }

    public function store_verifikasi_pelamar(Request $request, $id)
    {
        if($request->status_ijazah != 0 && $request->status_ktp != 0 && $request->status_ksk != 0 && $request->status_akte_lahir != 0 && $request->status_skck != 0 && $request->status_rekening != 0 && $request->status_foto != 0){
            md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>'2',
            'status_ijazah'=>$request->status_ijazah,
            'status_ktp'=>$request->status_ktp,
            'status_ksk'=>$request->status_ksk,
            'status_akte_lahir'=>$request->status_akte_lahir,
            'status_skck'=>$request->status_skck,
            'status_rekening'=>$request->status_rekening,
            'status_foto'=>$request->status_foto
            ));
        }
        else{
            md_jobseeker::where('users_id',$id)->update(array(
            'status_diterima'=>'0',
            'status_ijazah'=>$request->status_ijazah,
            'status_ktp'=>$request->status_ktp,
            'status_ksk'=>$request->status_ksk,
            'status_akte_lahir'=>$request->status_akte_lahir,
            'status_skck'=>$request->status_skck,
            'status_rekening'=>$request->status_rekening,
            'status_foto'=>$request->status_foto
            ));
        }
        return redirect()->route('pegawai.index');
    }

    public function getPayroll(){
        $data = DB::table('user')
            ->join('tbl_gaji_shelter_hdr','tbl_gaji_shelter_hdr.nik','=','user.id')
            ->select('user.id','user.nama','tbl_gaji_shelter_hdr.bln','tbl_gaji_shelter_hdr.thn','tbl_gaji_shelter_hdr.kode_gaji')
            ->where('user.iskaryawan','=','1')
            ->orderby('user.nama')
            ->orderby('tbl_gaji_shelter_hdr.thn')
            ->orderby('tbl_gaji_shelter_hdr.bln')
            ->orderby('user.id')
            ->paginate(10);
        return view ('payroll.index',compact('data'));
    }

    public function getSlipGaji($kode_gaji){
        $id = strtok( $kode_gaji, '_' );
//        $kar = user_indra::all()->where('id','=',$id)->first();
        $kar = DB::table('user')
            ->where('id','=',$id)->first();
        $client = "PT. Swabina Gatra";
        $gaji = DB::table('tbl_gaji_shelter_dtl')
            ->join('st_komponen_gaji','st_komponen_gaji.kode_komponen_gaji','tbl_gaji_shelter_dtl.kode_komponen_gaji')
            ->select('st_komponen_gaji.num','tbl_gaji_shelter_dtl.*')
            ->where('tbl_gaji_shelter_dtl.kode_gaji','=',$kode_gaji)
            ->orderby('st_komponen_gaji.num')
            ->get();
//        return $gaji;

        $index = 0;
        $total_pen = 0;
        if(count($gaji)>0){
            foreach ($gaji as $x){
                if ($x->id_pendapatan == 1){
                    $total_pen = $total_pen + $x->nilai_gaji;

                    $label[$index] = $x->label_slip_gaji;
                    $nilai[$index] = $x->nilai_gaji;

                    $index++;
                }
            }
        }
        $tot = $total_pen;

        $potongan = DB::table('st_pot_bpjs')->get();
        $index_pot = 0;
        $tot_pot = 0;
        foreach ($potongan as $pot){
            $label_pot[$index_pot] = $pot->deskripsi;
            $nilai_potongan = (($pot->prosen_potongan)/100)*$total_pen;
            $nilai_pot[$index_pot] = $nilai_potongan;

            $tot = $tot - $nilai_potongan;
            $tot_pot = $tot_pot + $nilai_potongan;

            $index_pot++;
        }

        return view ('payroll.slip',compact('client',
            'kar',
            'gaji',
            'kode_gaji',
            'total_pen',
            'label',
            'nilai',
            'index',
            'label_pot',
            'nilai_pot',
            'index_pot',
            'tot',
            'tot_pot'
        ));
    }
}

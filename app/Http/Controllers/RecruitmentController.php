<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Gate;
use Alert;
//---=main data
use App\User;
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
use App\st_jobseeker_susunankeluarga;
use App\st_jobseeker_datakeluarga;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pendidikanbahasa;
use App\st_jobseeker_minatkerja;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use PDF;

class RecruitmentController extends Controller
{
	public function create(){
		$kabkota = st_Kabkota::all();
		$kecamatan = st_Kecamatan::all();
		$tingkat_pendidikan = st_Tingkatpendidikan::all();
		return view ('recruitment.create',compact('kabkota','kecamatan','tingkat_pendidikan'));
	}

    public function getKecamatan($id) {
        $kecamatan = st_Kecamatan::where('regency_id', '=', $id)->get();
        return response()->json($kecamatan, 200);
    }

	public function store(Request $request)
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
}

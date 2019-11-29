<?php

namespace App\Imports;

use App\User;
use App\md_jobseeker;
use App\st_jobseeker_pendidikanformal;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobseekerImport implements ToCollection, WithHeadingRow
{
    private function insertData($row) {

        try {
            $user = new User();
            $user->name = $row['nama_lengkap'];
            $user->email = $row['email'];
            $user->password = \Hash::make('111111');
            $user->save();

            $jobseeker = new md_jobseeker();
            $jobseeker->users_id = $user->id;
            $jobseeker->nama_lengkap = $row['nama_lengkap'];
            $jobseeker->NIK = $row['nik'];
            $jobseeker->tempat_lahir = $row['tempat_lahir'];
            $jobseeker->tanggal_lahir = $row['tanggal_lahir'];
            $jobseeker->jenis_kelamin = $row['jenis_kelamin'];
            $jobseeker->agama = $row['agama'];
            $jobseeker->alamat_ktp = $row['alamat_ktp'];
            $jobseeker->nohp = $row['nohp'];
            $jobseeker->alasan_melamar = $row['alasan_melamar'];           
            $jobseeker->radio_bersedia_sift = $row['radio_bersedia_sift'];           
            $jobseeker->radio_bersedia_mutasi = $row['radio_bersedia_mutasi'];           
            $jobseeker->alasan_mutasi = $row['alasan_mutasi'];           
            $jobseeker->alasan_sift = $row['alasan_sift'];           
            $jobseeker->save(); 

            // $pendidikan_formal = new st_jobseeker_pendidikanformal();
            // $pendidikan_formal->user_id = $user->id;
            // $pendidikan_formal->tingkat_pendidikan = $row['tingkat_pendidikan'];
            // $pendidikan_formal->nama_sekolah = $row['nama_sekolah'];
            // $pendidikan_formal->id_kabkota = $row['kota_pendidikan'];
            // $pendidikan_formal->jurusan = $row['jurusan_pendidikan'];
            // $pendidikan_formal->keterangan = $row['lulus'];
            // $pendidikan_formal->tahun_lulus = $row['tahun_lulus_pendidikan'];
            // $pendidikan_formal->kelas_terakhir = $row['kelas_terakhir_pendidikan'];
            // $pendidikan_formal->save();
            
            //         $pendidikan_informal = new st_jobseeker_pendidikaninformal();
            //         $pendidikan_informal->user_id = $user->id;
            //         $pendidikan_informal->nama_kursus = $row['nama_kursus'];
            //         $pendidikan_informal->nama_lembaga = $row['nama_lembaga_kursus'];
            //         $pendidikan_informal->id_kabkota = $row['kota_kursus'];
            //         $pendidikan_informal->tahun_lulus = $row['tahun_lulus_kursus'];
            //         $pendidikan_informal->lama_pendidikan = $row['lama_pendidikan_kursus'];
            //         $pendidikan_informal->save();

            //         $kerja = new st_jobseeker_pengalamankerja();
            //         $kerja->user_id = $user->id;
            //         $kerja->nama_perusahaan = $row['nama_perusahaan_riwayat'];
            //         $kerja->alamat_perusahaan = $row['alamat_perusahaan_riwayat'];
            //         $kerja->jabatan = $row['jabatan_perusahaan_riwayat'];
            //         $kerja->alasan_pindah = $row['alasan_berhenti_perusahaan_riwayat'];
            //         $kerja->bulan_masuk = $row['bulan_masuk_pekerjaan_riwayat'];
            //         $kerja->bulan_keluar = $row['bulan_keluar_pekerjaan_riwayat'];
            //         $kerja->tahun_masuk = $row['tahun_masuk_pekerjaan_riwayat'];
            //         $kerja->tahun_keluar = $row['tahun_keluar_pekerjaan_riwayat'];
            //         $kerja->save();

            //         $organisasi = new st_jobseeker_pengalamanorganisasi();
            //         $organisasi->user_id = $user->id;
            //         $organisasi->organisasi = $row['nama_organisasi'];
            //         $organisasi->jenis_organisasi = $row['jenis_organisasi'];
            //         $organisasi->jabatan = $row['jabatan_organisasi'];
            //         $organisasi->tahun = $row['tahun_organisasi'];
            //         $organisasi->save();

            //         $data_keluarga = new st_jobseeker_datakeluarga();
            //         $data_keluarga->user_id = $user->id;
            //         $data_keluarga->nama_anggota_keluarga = $row['nama_keluarga'];
            //         $data_keluarga->hubungan_keluarga = $row['hubungan_keluarga'];
            //         $data_keluarga->jenis_kelamin = $row['jenis_kelamin_keluarga'];
            //         $data_keluarga->tempat_lahir = $row['tempat_lahir_keluarga'];
            //         $data_keluarga->tanggal_lahir = $row['tgl_lahir_keluarga'];
            //         $data_keluarga->bekerja = $row['bekerja_keluarga'];
            //         $data_keluarga->save();

            //         $susunan_keluarga = new st_jobseeker_susunankeluarga();
            //         $susunan_keluarga->user_id = $user->id;
            //         $susunan_keluarga->nama_anggota_keluarga = $row['nama_susunan_keluarga'];
            //         $susunan_keluarga->keanggotaan = $row['anggota_keluarga'];
            //         $susunan_keluarga->jenis_kelamin = $row['jenis_kelamin_susunan_keluarga'];
            //         $susunan_keluarga->usia = $row['usia_susunan_keluarga'];
            //         $susunan_keluarga->pendidikan = $row['pendidikan_susunan_keluarga'];
            //         $susunan_keluarga->pekerjaan = $row['pekerjaan_susunan_keluarga'];
            //         $susunan_keluarga->perusahaan = $row['perusahaan_susunan_keluarga'];
            //         $susunan_keluarga->save();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $this->insertData($row);
        }
    }

    private function returnMessage($status, $message, $data) {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}

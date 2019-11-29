<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\st_jobseeker_riwayatpenyakit;
use App\st_jobseeker_pengalamanorganisasi;
use App\st_jobseeker_pengalamankerja;
use App\st_jobseeker_pendidikanformal;
use App\st_jobseeker_pendidikaninformal;
use App\st_jobseeker_pendidikanbahasa;
use App\st_jobseeker_minatkerja;

class md_jobseeker extends Model
{
  protected $table = 'md_jobseeker';
  protected $primaryKey = 'users_id';
  protected $foreignKey1 = 'kecamatan_ktp';
  protected $foreignKey2 = 'kabkota_ktp';
  public $timestamps = false;
  public $incrementing = false;
  protected $guarded = ['users_id'];

  protected $identitas = ["NIK","nama_lengkap","nama_panggilan","tempat_lahir","tanggal_lahir",
  "jenis_kelamin","agama","alamat_ktp","alamat_domisili","negara_ktp","negara_domisili",
  "provinsi_ktp","provinsi_domisili","kabkota_ktp","kabkota_domisili","kecamatan_ktp","kecamatan_domisili",
  "kode_pos_ktp","kode_pos_domisili","email","notelp","nohp","kategori_idcard","nomor_idcard","alasan_melamar","radio_bersedia_sift","alasan_sift","radio_bersedia_mutasi","alasan_mutasi","status_diterima","status_ijazah","status_ktp","status_ksk","status_akte_lahir","status_skck","status_rekening","status_foto"];

  public function setStatusIdentitas(){
    $data = $this->attributes;
    $count = 0;
    foreach ($this->identitas as $key) {
      $count += is_null($data[$key])?0:1;
    }
    $count = ($count<23)?0:1;
    $this->update(["status_data_identitas"=>$count]);
    return $count;
  }

  public function setStatusKeluarga(){
    $keluarga = $this->attributes["status_keluarga"]? 1 : 0 ;
    $this->update(["status_data_keluarga"=>$keluarga]);
    return $keluarga;
  }

  public function setStatusPendidikan(){
    $formal   = st_jobseeker_pendidikanformal::where("user_id",$this->attributes['users_id'])->count();
    $informal = st_jobseeker_pendidikaninformal::where("user_id",$this->attributes['users_id'])->count();
    $bahasa   = st_jobseeker_pendidikanbahasa::where("user_id",$this->attributes['users_id'])->count();
    $this->update(["status_data_pendidikan"=>$formal]);

    return $formal;
  }

  public function setStatusPekerjaan(){
    $pengalamankerja = st_jobseeker_pengalamankerja::where("user_id",$this->attributes['users_id'])->count();

    $this->update(["status_data_pekerjaan"=>$pengalamankerja]);

    return $pengalamankerja;
  }

  public function setStatusAktivitas(){
    $aktivitas = st_jobseeker_pengalamanorganisasi::where("user_id",$this->attributes['users_id'])->count();
    $aktivitas = ($this->attributes["olahraga"] && $this->attributes["hobi"])?$aktivitas:0;
    $this->update(["status_data_aktivitas"=>$aktivitas]);

    return $aktivitas;
  }

  public function setStatusRiwayatPenyakit(){
    $riwayatpenyakit = st_jobseeker_riwayatpenyakit::where("user_id",$this->attributes['users_id'])->count();
    $riwayatpenyakit = $this->attributes["referensi_dari"]?$riwayatpenyakit:0;
    $this->update(["status_data_riwayatpenyakit"=>$riwayatpenyakit]);
    
    return $riwayatpenyakit;
  }

  public function setStatusMinat(){
    $minat = st_jobseeker_minatkerja::where("user_id",$this->attributes['users_id'])->count();
    
    $this->update(["status_data_minat"=>$minat]);

    return $minat;
  }

  public function setStatusLampiran(){
    $lampiran = ($this->attributes["lampiran_foto"] && $this->attributes["lampiran_ijazah"] && $this->attributes["lampiran_transkripnilai"] && $this->attributes["lampiran_referensikerja"])? 1 : 0 ;
    
    $this->update(["status_data_lampiran"=>$lampiran]);
    return $lampiran;
  }

  public function md_lowongan_pekerjaan(){
    return $this->hasMany('App\md_lowongan_pekerjaan');
  }

  public function st_idcard(){
    return $this->hasOne('App\st_IdCard','id','kategori_idcard');
  }

  public function st_negara(){
    return $this->hasOne('App\st_Negara','id','negara');
  }

  public function st_provinsi(){
    return $this->hasOne('App\st_Provinsi','id','provinsi');
  }

  public function st_kabkota(){
    return $this->hasOne('App\st_Kabkota',$this->foreignKey2);
  }

  public function st_kecamatan(){
    return $this->hasOne('App\st_Kecamatan',$this->foreignKey1);
  }

}

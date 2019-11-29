<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class md_karyawan_penilaian extends Model
{
  protected $table = 'md_karyawan_penilaian';
  protected $primaryKey = 'id_penilaian';
  protected $fk1 = 'id_karyawan';
  protected $fk2 = 'id_periode';
  public $timestamps = false;
  public $incrementing = false;
  protected $fillable = [
      'id_penilaian','id_karyawan','id_periode','nilai_disiplin','nilai_tanggung_jawab','nilai_kejujuran','nilai_loyalitas','nilai_inisiatif_kreativitas','nilai_kecakapan_keterampilan','nilai_hubungan_kerjasama','nilai_pengamanan_lingkungan','nilai_kepemimpinan','spesifikasi_pendidikan','spesifikasi_pengalaman','spesifikasi_pelatihan','spesifikasi_keterampilan','kesimpulan_saran','catatan_personalia','status_keluarga','nilai_spesifikasi_pendidikan','nilai_spesifikasi_pengalaman','nilai_spesifikasi_pelatihan','nilai_spesifikasi_keterampilan'
    ];

  public function st_periode_penilaian(){
      return $this->hasMany('App\st_periode_penilaian', $this->fk1);
  }

  public function md_user(){
      return $this->hasMany('App\md_user', $this->fk2);
  }
}

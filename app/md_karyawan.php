<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class md_karyawan extends Model
{
  protected $table = 'md_karyawan';
  protected $primaryKey = 'users_id';
  public $timestamps = false;
  public $incrementing = false;
  protected $fillable = [
      'NIK','nama_lengkap','nama_panggilan','tempat_lahir','tanggal_lahir','jenis_kelamin','alamat','agama','negara','provinsi','kabkota','kecamatan','kode_pos','email','notelp','nohp','kategori_idcard','nomor_idcard','status_keluarga','tanggal_keluarga','olahraga','hobi','referensi_dari'
    ];

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
    return $this->hasOne('App\st_Kabkota','id','kabkota');
  }

  public function st_kecamatan(){
    return $this->hasOne('App\st_Kecamatan','id','kecamatan');
  }

}

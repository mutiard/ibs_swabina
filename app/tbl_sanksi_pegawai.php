<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sanksi_pegawai extends Model
{
  protected $table = 'tbl_sanksi_pegawai';
  protected $primaryKey = 'id_sanksi_pegawai';
  protected $fk2 = 'id_karyawan';
  public $timestamps = false;
  protected $fillable = [
      'id_sanksi_pegawai','id_karyawan','jenis_sp','alasan_sp','tanggal_mulai','tanggal_selesai'
    ];

  public function md_user(){
      return $this->belongsTo('App\md_user', $this->fk2);
  }
}

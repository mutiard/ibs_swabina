<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class md_lowongan_jenis_tes extends Model
{
  protected $table = 'md_lowongan_jenis_tes';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = true;

  protected $fillable = [
      'id','md_lowongan_pekerjaan_id','st_jenis_tes_id'
  ];

}
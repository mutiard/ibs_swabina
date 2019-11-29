<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_periode_nilai extends Model
{
  protected $table = 'st_periode_nilai';
  protected $primaryKey = 'id_periode_nilai';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id_periode_nilai','s_bulan','e_bulan','tahun','status'];
}

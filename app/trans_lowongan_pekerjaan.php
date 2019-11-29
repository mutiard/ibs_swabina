<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trans_lowongan_pekerjaan extends Model
{
  protected $table = 'trans_lowongan_pekerjaan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $fillable = [
      'md_lowongan_pekerjaan_id','users_id','status'
    ];

  const CREATED_AT = 'entry_date';

  public function MD_Pelamar(){
    return $this->hasOne('App\User','id','users_id');
  }
}

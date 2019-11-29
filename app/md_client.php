<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class md_client extends Model
{
  protected $table = 'md_client';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $fillable = [
      'id','nama_client','alamat','no_hp'
    ];
  public function md_lowongan_pekerjaan()
    {
      return $this->hasMany('App\md_lowongan_pekerjaan');
    }
}

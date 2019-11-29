<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Kabkota extends Model
{
  protected $table = 'st_kabkota';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','province_id','name'];
  public function kecamatan(){
        return $this->hasMany('App\st\Kecamatan');
  }
  public function provinsi(){
        return $this->belongsTo('App\st\Provinsi');
  }
}

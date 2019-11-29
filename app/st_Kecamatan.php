<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Kecamatan extends Model
{
  protected $table = 'st_kecamatan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','regency_id','name'];
  public function Kabkota(){
        return $this->belongsTo('App\st\Kabkota');
  }
}

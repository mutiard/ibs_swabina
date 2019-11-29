<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Provinsi extends Model
{
  protected $table = 'st_provinsi';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','name','country_id'];
  public function kabkota(){
        return $this->hasMany('App\st\Kabkota','id');
  }
  public function negara(){
        return $this->belongsTo('App\st\Negara','id','country_id');
  }
}

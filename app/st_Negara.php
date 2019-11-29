<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Negara extends Model
{
  protected $table = 'st_country';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','negara'];
  public function provinsi(){
        return $this->hasMany('App\st\Provinsi');
  }
}

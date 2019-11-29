<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Lingkungankerja extends Model{
  protected $table = 'st_lingkungankerja';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ['id','lingkungan'];  
}
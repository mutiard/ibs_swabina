<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class st_Spesialisasipekerjaan extends Model
{
  protected $table = 'st_spesialisasipekerjaan';
  protected $primaryKey = 'id';
  public $timestamps = false;
  public $incrementing = false;

  protected $guarded = ["id","name"];
  protected $fillable = ["id","spesial"];

}

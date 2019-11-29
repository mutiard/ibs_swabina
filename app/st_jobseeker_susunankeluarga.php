<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class st_jobseeker_susunankeluarga extends Model
{
    protected $table = 'st_jobseeker_susunankeluarga';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
      'id','user_id','nama_anggota_keluarga','keanggotaan','jenis_kelamin','usia','pendidikan','pekerjaan','perusahaan'
      ];
  
    public function user_id(){
      return $this->hasOne('App\md_jobseeker','id','users_id');
    }

     protected static function boot(){
      parent::boot();
      static::creating(function ($model) {
          try {
              $model->id = Uuid::uuid4()->toString();
          } catch (UnsatisfiedDependencyException $e) {
              abort(500, $e->getMessage());
          }
      });
    }
    
}

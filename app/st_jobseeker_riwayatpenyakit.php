<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class st_jobseeker_riwayatpenyakit extends Model
{
    protected $table = 'st_jobseeker_riwayatpenyakit';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
      'id','user_id','nama_penyakit','tanggal_mulai','tanggal_akhir','pengaruh'
      ];
  
    public function st_idcard(){
      return $this->hasOne('App\st_IdCard','id','kategori_idcard');
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

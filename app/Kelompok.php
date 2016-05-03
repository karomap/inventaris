<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';
    public $timestamps = false;

    public function bidang()
    {
      return $this->belongsTo('App\Bidang', 'id_bidang');
    }

    public function subkelompok()
    {
      return $this->hasMany('App\SubKelompok', 'id_kelompok');
    }
}

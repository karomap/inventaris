<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKelompok extends Model
{
    protected $table = 'sub_kelompok';
    public $timestamps = false;

    public function kelompok()
    {
      return $this->belongsTo('App\Kelompok', 'id_kelompok');
    }

    public function kategori()
    {
      return $this->hasMany('App\Kategori', 'id_subkelompok');
    }
}

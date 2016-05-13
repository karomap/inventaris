<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    protected $table = 'rekap';

    protected $guarded = [];

    public function bidang()
    {
      return $this->belongsTo('App\Bidang');
    }
}

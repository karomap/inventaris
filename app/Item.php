<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    public function kategori()
    {
      return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function pembuat()
    {
      return $this->belongsTo('App\User', 'register');
    }
}

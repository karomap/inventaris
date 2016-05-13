<?php

namespace App;

use Carbon\Carbon;
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

    public function getTglUpdateAttribute()
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d');
    }

    public function getBulanUpdateAttribute($updated_at)
    {
      return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->formatLocalized('%B');
    }
}

<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bidang extends Model
{
    protected $table = 'bidang';
    public $timestamps = false;

    public function golongan()
    {
      return $this->belongsTo('App\Golongan', 'id_gol');
    }

    public function kelompok()
    {
      return $this->hasMany('App\Kelompok', 'id_bidang');
    }

    public function jumlah()
    {
      $id = $this->attributes['id'];
      $item = Item::select(DB::raw('count(*) as jumlah'))->whereRaw("id_kategori LIKE '{$id}%'")->get();
      return $item[0]->jumlah;
    }

    public function harga()
    {
      $id = $this->attributes['id'];
      $item = Item::select(DB::raw('SUM(harga) as harga'))->whereRaw("id_kategori LIKE '{$id}%'")->get();
      return $item[0]->harga;
    }
}

<?php

namespace App;

use App\Item;
use App\Rekap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Golongan extends Model
{
    protected $table = 'golongan';
    public $timestamps = false;

    public function bidang()
    {
      return $this->hasMany('App\Bidang', 'id_gol');
    }

    public function jumlah()
    {
      $id = $this->attributes['id'];
      $item = Item::select(DB::raw('count(*) as jumlah'))->whereRaw("id_kategori LIKE '{$id}%'")->get();
      return $item[0]->jumlah;
    }

    public function jumlahRekap()
    {
      $id = $this->attributes['id'];
      $first_date = date('Y').'-01-01';
      $item = Rekap::select(DB::raw('sum(jumlah) as jumlah'))->whereRaw("id_bidang LIKE '{$id}%' AND DATE(created_at) = '{$first_date}'")->get();
      return $item[0]->jumlah;
    }

    public function harga()
    {
      $id = $this->attributes['id'];
      $item = Item::select(DB::raw('sum(harga) as harga'))->whereRaw("id_kategori LIKE '{$id}%'")->get();
      return $item[0]->harga;
    }

    public function hargaRekap()
    {
      $id = $this->attributes['id'];
      $first_date = date('Y').'-01-01';
      $item = Rekap::select(DB::raw('sum(harga) as harga'))->whereRaw("id_bidang LIKE '{$id}%' AND DATE(created_at) = '{$first_date}'")->get();
      return $item[0]->harga;
    }
}

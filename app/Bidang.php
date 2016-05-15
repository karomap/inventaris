<?php

namespace App;

use App\Item;
use App\Rekap;
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

    public function rekap()
    {
      return $this->hasMany('App\Rekap', 'id_bidang');
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
      $item = Rekap::select('jumlah')->whereRaw("id_bidang = {$id} AND DATE(created_at) = '{$first_date}'")->get();
      return $item[0]->jumlah;
    }

    public function harga()
    {
      $id = $this->attributes['id'];
      $item = Item::select(DB::raw('SUM(harga) as harga'))->whereRaw("id_kategori LIKE '{$id}%'")->get();
      return $item[0]->harga;
    }

    public function hargaRekap()
    {
      $id = $this->attributes['id'];
      $first_date = date('Y').'-01-01';
      $item = Rekap::select('harga')->whereRaw("id_bidang = {$id} AND DATE(created_at) = '{$first_date}'")->get();
      return $item[0]->harga;
    }
}

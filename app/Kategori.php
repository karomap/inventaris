<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public $timestamps = false;

    public function subkelompok()
    {
      return $this->belongsTo('App\SubKelompok', 'id_subkelompok');
    }

    public function inventaris()
    {
      return $this->hasMany('App\Item', 'id_kategori');
    }

    public function parent($param)
    {
      $golongan = $this->subkelompok->kelompok->bidang->golongan->uraian;
      $bidang = $this->subkelompok->kelompok->bidang->uraian;
      $kelompok = $this->subkelompok->kelompok->uraian;
      $subkelompok = $this->subkelompok->uraian;
      $kategori = $this->uraian;

      switch ($param) {
        case 'golongan':
          return $golongan;
          break;

        case 'bidang':
          return $bidang;
          break;

        case 'kelompok':
          return $kelompok;
          break;

        case 'subkelompok':
          return $subkelompok;
          break;

        case 'list':
          return $golongan.' > '.$bidang.' > '.$kelompok.'\n'.$subkelompok.' > '.$kategori;

        default:
          return collect(compact(['golongan', 'bidang', 'kelompok', 'subkelompok', 'kategori']));
          break;
      }
    }
}

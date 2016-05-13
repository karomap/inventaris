<?php

use App\Bidang;
use App\Golongan;
use App\Item;
use App\Kategori;
use App\Kelompok;
use App\SubKelompok;

setlocale(LC_ALL, 'id-ID');

function formatKode($kode)
{
  $split = str_split($kode, 2);
  return implode('.', $split);
}

function listKategori($param, $id = null)
{
  switch ($param) {
    case 'golongan':
      $kategori = Golongan::get();
      foreach ($kategori as $kat) {
        $result[$kat->id] = $kat->uraian;
      }
      break;

    case 'bidang':
      $kategori = Bidang::where('id_gol', $id)->get();
      $result[''] = 'SEMUA BIDANG';
      foreach ($kategori as $kat) {
        $result[$kat->id] = $kat->uraian;
      }
      break;

    case 'kelompok':
      $kategori = Kelompok::where('id_bidang', $id)->get();
      $result[''] = 'SEMUA KELOMPOK';
      foreach ($kategori as $kat) {
        $result[$kat->id] = $kat->uraian;
      }
      $result = collect($result);
      break;

    case 'subkelompok':
      $kategori = SubKelompok::where('id_kelompok', $id)->get();
      $result[''] = 'SEMUA SUB KELOMPOK';
      foreach ($kategori as $kat) {
        $result[$kat->id] = $kat->uraian;
      }
      $result = collect($result);
      break;

    case 'kat':
      $kategori = Kategori::where('id_subkelompok', $id)->get();
      $result[''] = 'SEMUA KATEGORI';
      foreach ($kategori as $kat) {
        $result[$kat->id] = $kat->uraian;
      }
      $result = collect($result);
      break;

    default:
      $result = null;
      break;
  }

  return $result;
}

function spell($number)
{
  $f = new NumberFormatter('id', NumberFormatter::SPELLOUT);
  return ucwords($f->format($number));
}

function jumlah($var)
{
  switch ($var) {
    case 'item':
      return Item::count();
      break;

    case 'item_b':
      return Item::where('keadaan', 'b')->count();
      break;

    case 'item_kb':
      return Item::where('keadaan', 'kb')->count();
      break;

    case 'item_rb':
      return Item::where('keadaan', 'rb')->count();
      break;

    default:
      # code...
      break;
  }
}


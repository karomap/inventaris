<?php

use App\Bidang;
use App\Golongan;
use App\Item;
use App\Kelompok;

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
      foreach ($kategori as $kat) {
        $result[$kat->id] = $kat->uraian;
      }
      break;

    case 'kelompok':
      $kategori = Kelompok::get();
      foreach ($kategori as $kat) {
        $result[] = $kat->uraian;
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

function respell($r, $p, $s, $x = null)
{
  $satuan = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan'];
  $belasan = ['sepuluh', 'sebelas', 'dua belas', 'tiga belas', 'empat belas', 'lima belas', 'enam belas', 'tujuh belas', 'delapan belas', 'sembilan belas'];

  !empty($x) ? $x = ' '.$x.' ' : '';

  $result = '';

  $r > 0 ? ($r == 1 ? $result .= ' seratus ' : $result .= $satuan[$r].' ratus ' ) : '';
  if ($p == 1) {
    $result .= $belasan[$s].$x;
  } elseif($p > 1) {
    $result .= $satuan[$p].' puluh ';
  }
  $p != 1 && ($r > 0 || $p > 1) ? $result .= $satuan[$s].$x : '';

  if (empty($result)) {
    $result .= $satuan[$s];
  }

  return $result;
}

function numspell($num)
{
  $newnum = str_pad($num, 15, '0', STR_PAD_LEFT);
  $split = str_split($newnum);

  list( $ratril, $pultril, $tril, $ratm, $pulm, $m, $ratjt, $puljt, $jt, $ratr, $pulr, $rib, $rat, $pul, $sat ) = $split;

  $result = '';

  $result .= respell($ratril, $pultril, $tril, 'triliun');
  $result .= respell($ratm, $pulm, $m, 'milyar');
  $result .= respell($ratjt, $puljt, $jt, 'juta');
  $result .= respell($ratr, $pulr, $rib, 'ribu');
  $result .= respell($rat, $pul, $sat);

  return ucwords($result);
}

function jumlah($var)
{
  switch ($var) {
    case 'item':
      return Item::count();
      break;
    
    default:
      # code...
      break;
  }
}


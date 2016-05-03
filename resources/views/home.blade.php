@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Statistik</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th class="text-center">Kode</th>
              <th class="text-center">Bidang</th>
              <th class="text-center">Jumlah Barang</th>
              <th class="text-center">Jumlah Harga (Rp.)</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0 ?>
            @foreach($golongan as $gol)
              <tr>
                <td class="text-center"><span class="badge">{{ $gol->golongan }}</span></td>
                <td><span class="badge">{{ $gol->uraian }}</span></td>
                <td class="text-center"><span class="badge">{{ $gol->jumlah() }}</span></td>
                <td class="text-right"><span class="badge">{{ $gol->harga() > 0 ? number_format($gol->harga(), 2, ',', '.') : '-' }}</span></td>
              </tr>
              <?php $total += $gol->harga() ?>
              @foreach($gol->bidang as $bidang)
                <tr>
                  <td class="text-center">{{ $bidang->bidang }}</td>
                  <td>{{ $bidang->uraian }}</td>
                  <td class="text-center">{{ $bidang->jumlah() }}</td>
                  <td class="text-right">{{ $bidang->harga() > 0 ? number_format($bidang->harga(), 2, ',', '.') : '-' }}</td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>

        <hr>
        <div class="pull-left">
          Total : {{ numspell($total) }} Rupiah
        </div>
        <div class="pull-right">
          <span class="badge">Total : Rp. {{ number_format($total, 2, ',', '.') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

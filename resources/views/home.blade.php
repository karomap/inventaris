@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<<<<<<< HEAD
<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-cubes"></i> Total Barang</span>
    <div class="count">{{ jumlah('item') }}</div>
    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
    <div class="count">123.50</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
    <div class="count green">2,500</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
    <div class="count">4,567</div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
    <div class="count">2,315</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
    <div class="count">e</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
</div>
<!-- /top tiles -->

=======
>>>>>>> 2beb6507ba950b07bbb2cfb3fca9cb70b58a8771
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Statistik</h2>
<<<<<<< HEAD

        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>

=======
>>>>>>> 2beb6507ba950b07bbb2cfb3fca9cb70b58a8771
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

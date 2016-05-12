<script type="text/javascript">
  if (document.getElementsByClassName("right_col").length < 1) {
    document.location.replace('/');
  }
</script>

<div class="page-title">
  <div class="title_left">
    <h3 class="judul" data-current="dashboard">Dashboard</h3>
  </div>
  <div class="pull-right">
  </div>
</div>
<div class="clearfix"></div>
<hr style="margin-top: 0">

<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-cubes"></i> Total Barang</span>
    <div class="count">{{ jumlah('item') }}</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i> From last Week</span>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-check"></i> Kondisi Baik </span>
    <div class="count green">{{ jumlah('item_b') }}</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-exclamation-triangle"></i> Kondisi Kurang Baik</span>
    <div class="count">{{ jumlah('item_kb') }}</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-ban"></i> Kondisi Rusak Berat</span>
    <div class="count red">{{ jumlah('item_rb') }}</div>
    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
  </div>
</div>
<!-- /top tiles -->

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Statistik</h2>

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

        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">Kode</th>
                <th class="text-center">Bidang</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga (Rp.)</th>
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
        </div>

        <hr>
        <div class="pull-left">
          Total : {{ spell($total) }} Rupiah
        </div>
        <div class="pull-right">
          <span class="badge">Total : Rp. {{ number_format($total, 2, ',', '.') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  boxTool();
</script>

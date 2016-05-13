<div id="activePage" class="hidden">dashboard</div>

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
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-check"></i> Kondisi Baik </span>
    <div class="count green">{{ jumlah('item_b') }}</div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-exclamation-triangle"></i> Kondisi Kurang Baik</span>
    <div class="count yellow">{{ jumlah('item_kb') }}</div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-ban"></i> Kondisi Rusak Berat</span>
    <div class="count red">{{ jumlah('item_rb') }}</div>
  </div>
</div>
<!-- /top tiles -->

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Statistik</h2>

        <ul class="nav navbar-right panel_toolbox">
          <li style="float: right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>

        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="table-responsive">
          <table class="table table-hover table-bordered dashboard-stat">
            <thead>
              <tr>
                <th rowspan="2" class="text-center">Kode</th>
                <th rowspan="2" class="text-center">Bidang</th>
                <th colspan="2" class="text-center">Keadaan per 31 Desember {{ date('Y')-1 }}</th>
                <th colspan="2" class="text-center">Keadaan per {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</th>
              </tr>
              <tr>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga (Rp.)</th>
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
                  <td class="text-center"><span class="badge">{{ $gol->jumlahRekap() }}</span></td>
                  <td class="text-right"><span class="badge">{{ $gol->hargaRekap() > 0 ? number_format($gol->harga(), 2, ',', '.') : '-' }}</span></td>
                  <td class="text-center"><span class="badge">{{ $gol->jumlah() }}</span></td>
                  <td class="text-right"><span class="badge">{{ $gol->harga() > 0 ? number_format($gol->harga(), 2, ',', '.') : '-' }}</span></td>
                </tr>
                <?php $total += $gol->harga() ?>
                @foreach($gol->bidang as $bidang)
                  <tr>
                    <td class="text-center">{{ $bidang->bidang }}</td>
                    <td>{{ $bidang->uraian }}</td>
                    <td class="text-center">{{ $bidang->jumlahRekap() }}</td>
                    <td class="text-right">{{ $bidang->harga() > 0 ? number_format($bidang->hargaRekap(), 2, ',', '.') : '-' }}</td>
                    <td class="text-center">{{ $bidang->jumlah() }}</td>
                    <td class="text-right">{{ $bidang->harga() > 0 ? number_format($bidang->harga(), 2, ',', '.') : '-' }}</td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
        </div>

        <hr>
        <div class="pull-right">
          <span class="badge">Total : Rp. {{ number_format($total, 2, ',', '.') }}</span>
        </div>
        <div class="clearfix"></div>
        <small>Total : {{ spell($total) }} Rupiah</small>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  boxTool();
</script>

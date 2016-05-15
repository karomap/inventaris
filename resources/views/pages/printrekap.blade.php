<div class="print-wrapper">
  <div id="print">
    <style type="text/css" media="print">
      @page {
        size: auto;
        margin: 0;
      }
      #print .kop p {
        font-weight: bold;
        text-align: center;
        margin-bottom: 0;
        margin-top: 5px;
      }
    </style>
    <style type="text/css">
      #print {
        font-family: 'Arial';
        font-size: 12px;
        color: #000;
        width: 330mm;
        padding: 15px;
      }
      #print .kop {
        width: 100%;
        height: 100px;
        margin-bottom: 20px;
      }
      #print .kop img {
        height: 90px;
        position: absolute;
        left: 50px;
      }
      #print .kop p {
        font-weight: bold;
        text-align: center;
        margin-bottom: 0;
      }
      #print .kop span {
        text-align: center;
        display: block;
      }
      #print table {
        width: 100%;
        border-collapse: collapse;
      }
      #print tr td, #print tr th {
        border: 1px solid #000;
        padding: 3px;
      }
      #print tr th {
        text-align: center;
        vertical-align: middle;
      }
      #print .r {
        text-align: right;
      }
      #print .e {
        text-align: center;
      }
      #print .thx {
        border-bottom: 2px solid #000;
      }
    </style>
    <div class="kop">
      <img src="{{ asset('images/logo.png') }}">

      <p style="font-size: 16px">DINAS CIPTA KARYA DAN PERUMAHAN RAKYAT</p>
      <p style="font-size: 14px">PEMERINTAH KABUPATEN INDRAGIRI HILIR</p>
      <p style="font-size: 18px">REKAPITULASI MUTASI BARANG</p>
      <span>TAHUN ANGGARAN {{ date('Y') }}</span>
    </div>

    <table>
      <thead>
        <tr>
          <th rowspan="3">KODE</th>
          <th rowspan="3">NAMA BARANG<br>BERDASARKAN BIDANG BARANG</th>
          <th colspan="2">KEADAAN PER 31 DES {{ date('Y')-1 }}</th>
          <th colspan="4">MUTASI / PERUBAHAN</th>
          <th colspan="2">KEADAAN PER 31 DES {{ date('Y') }}</th>
          <th rowspan="3">KETERANGAN</th>
        </tr>
        <tr>
          <th rowspan="2">JUMLAH</th>
          <th rowspan="2">HARGA<br>(ribuan)</th>
          <th colspan="2">BERTAMBAH</th>
          <th colspan="2">BERKURANG</th>
          <th rowspan="2">JUMLAH</th>
          <th rowspan="2">HARGA<br>(ribuan)</th>
        </tr>
        <tr>
          <th rowspan="2">JUMLAH</th>
          <th rowspan="2">HARGA<br>(ribuan)</th>
          <th rowspan="2">JUMLAH</th>
          <th rowspan="2">HARGA<br>(ribuan)</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0 ?>
        @foreach($golongan as $gol)
          <tr>
            <td class="text-center"><strong>{{ $gol->golongan }}</strong></td>
            <td><strong>{{ $gol->uraian }}</strong></td>
            <td class="text-center">{{ $gol->jumlahRekap() > 0 ? $gol->jumlahRekap() : '-' }}</td>
            <td class="text-right">{{ $gol->hargaRekap() > 0 ? number_format($gol->hargaRekap(), 0, ',', '.') : '-' }}</td>
            <td class="text-center">{{ $gol->jumlah() > $gol->jumlahRekap() ? $gol->jumlah() - $gol->jumlahRekap() : '-' }}</td>
            <td class="text-right">{{ $gol->harga() > $gol->hargaRekap() ? number_format($gol->harga() - $gol->hargaRekap(), 0, ',', '.') : '-' }}</td>
            <td class="text-center">{{ $gol->jumlah() < $gol->jumlahRekap() ? $gol->jumlahRekap() - $gol->jumlah() : '-' }}</td>
            <td class="text-right">{{ $gol->harga() < $gol->hargaRekap() ? number_format($gol->hargaRekap() - $gol->harga(), 0, ',', '.') : '-' }}</td>
            <td class="text-center">{{ $gol->jumlah() > 0 ? $gol->jumlah() : '-' }}</td>
            <td class="text-right">{{ $gol->harga() > 0 ? number_format($gol->harga(), 2, ',', '.') : '-' }}</td>
            <td></td>
          </tr>
          <?php $total += $gol->harga() ?>
          @foreach($gol->bidang as $bidang)
            <tr>
              <td class="text-center">{{ $bidang->bidang }}</td>
              <td>{{ $bidang->uraian }}</td>
              <td class="text-center">{{ $bidang->jumlahRekap() > 0 ? $bidang->jumlahRekap() : '-' }}</td>
              <td class="text-right">{{ $bidang->harga() > 0 ? number_format($bidang->hargaRekap(), 0, ',', '.') : '-' }}</td>
              <td class="text-center">{{ $bidang->jumlah() > $bidang->jumlahRekap() ? $bidang->jumlah() - $bidang->jumlahRekap() : '-' }}</td>
              <td class="text-right">{{ $bidang->harga() > $bidang->hargaRekap() ? number_format($bidang->harga() - $bidang->hargaRekap(), 0, ',', '.') : '-' }}</td>
              <td class="text-center">{{ $bidang->jumlah() < $bidang->jumlahRekap() ? $bidang->jumlahRekap() - $bidang->jumlah() : '-' }}</td>
              <td class="text-right">{{ $bidang->harga() < $bidang->hargaRekap() ? number_format($bidang->hargaRekap() - $bidang->harga(), 0, ',', '.') : '-' }}</td>
              <td class="text-center">{{ $bidang->jumlah() > 0 ? $bidang->jumlah() : '-' }}</td>
              <td class="text-right">{{ $bidang->harga() > 0 ? number_format($bidang->harga(), 0, ',', '.') : '-' }}</td>
              <td></td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>
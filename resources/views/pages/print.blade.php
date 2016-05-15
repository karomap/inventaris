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
        margin-top: 5px;
      }
    </style>
    <style type="text/css">
      #print {
        font-family: sans-serif;
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
        left: 100px;
      }
      #print .kop p {
        font-weight: bold;
        font-size: 16px;
        text-align: center;
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

      <br>
      <p style="font-size: 18px">DINAS CIPTA KARYA DAN PERUMAHAN RAKYAT</p>
      <p>PEMERINTAH KABUPATEN INDRAGIRI HILIR</p>
    </div>

    <table>
      <thead>
        <tr>
          <th colspan="3">NOMOR</th>
          <th colspan="3">SPESIFIKASI BARANG</th>
          <th rowspan="2">Bahan</th>
          <th rowspan="2">Asal/Cara<br>Perolehan<br>Barang</th>
          <th rowspan="2">Tahun<br>Pem-<br>belian</th>
          <th rowspan="2">Ukuran<br>Barang/<br>Konstruksi<br>(P, S, D)</th>
          <th rowspan="2">Satuan</th>
          <th rowspan="2">Keadaan<br>Barang<br>(B/KB/RB)</th>
          <th colspan="2">JUMLAH</th>
          <th rowspan="2">Keterangan</th>
        </tr>
        <tr>
          <th>Urut</th>
          <th>Kode Barang</th>
          <th>Register</th>
          <th>Nama / Jenis Barang</th>
          <th>Merk/<br>Type</th>
          <th>No. Sertifikat<br>No. Pabrik<br>No. Chasis<br>No. Mesin</th>
          <th>Barang</th>
          <th>Harga</th>
        </tr>
        <tr class="thx">
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
          <th>11</th>
          <th>12</th>
          <th>13</th>
          <th>14</th>
          <th>15</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1 ?>
        @foreach($items as $item)
          <tr>
            <td class="r">{{ $no++ }}</td>
            <td class="e">{{ formatKode(str_pad($item->id_kategori, 10, '0', STR_PAD_LEFT)) }}</td>
            <td class="e">{{ str_pad($item->register, 3, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $item->kategori->uraian }}</td>
            <td class="e">{{ $item->merk_type }}</td>
            <td>{{ $item->no_spcm }}</td>
            <td>{{ $item->bahan }}</td>
            <td>{{ ucfirst($item->asal) }}</td>
            <td class="e">{{ $item->tahun }}</td>
            <td class="e">{{ $item->ukuran_konstruksi }}</td>
            <td class="e">{{ $item->satuan }}</td>
            <td>{{ ['b' => 'Baik', 'kb' => 'Kurang Baik', 'rb' => 'Rusak Berat'][$item->keadaan] }}</td>
            <td class="r">{{ $item->jumlah }}</td>
            <td class="r">{{ number_format($item->harga, 0, ',', '.') }}</td>
            <td>{{ $item->keterangan }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
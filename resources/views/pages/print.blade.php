<div class="print-wrapper">
  <div id="print">
    <style type="text/css" media="print">
      @page {
        size: auto;
        margin: 0;
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
      #print table {
        width: 100%;
        border-collapse: collapse;
      }
      #print tr td, #print tr th {
        border: 1px solid #000;
        padding: 0 3px;
      }
      #print tr th {
        text-align: center;
        vertical-align: middle;
      }
      #print .harga {
        text-align: right;
      }
    </style>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Register</th>
          <th>Nama / Jenis</th>
          <th>Merk / Type</th>
          <th>No. SPCM</th>
          <th>Bahan</th>
          <th>Asal/<br>Cara Perolehan</th>
          <th>Tahun<br>Pembelian</th>
          <th>Ukuran/<br>Konstruksi</th>
          <th>Satuan</th>
          <th>Keadaan</th>
          <th>Jumlah</th>
          <th>Harga (Rp.)</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1 ?>
        @foreach($items as $item)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ formatKode(str_pad($item->id_kategori, 10, '0', STR_PAD_LEFT)) }}</td>
            <td>{{ str_pad($item->register, 3, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $item->kategori->uraian }}</td>
            <td>{{ $item->merk_type }}</td>
            <td>{{ $item->no_spcm }}</td>
            <td>{{ $item->bahan }}</td>
            <td>{{ ucfirst($item->asal) }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->ukuran_konstruksi }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ ['b' => 'Baik', 'kb' => 'Kurang Baik', 'rb' => 'Rusak Berat'][$item->keadaan] }}</td>
            <td>{{ $item->jumlah }}</td>
            <td class="harga">{{ number_format($item->harga, 0, ',', '.') }}</td>
            <td>{{ $item->Keterangan }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
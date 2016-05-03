<div class="table-responsive">
  <table class="table table-hover">
    <tr>
      <td><strong>Kode Barang</strong></td>
      <td>{{ formatKode(str_pad($item->id_kategori, 10, '0', STR_PAD_LEFT)) }}</td>
    </tr>
    <tr>
      <td><strong>Register</strong></td>
      <td>{{ str_pad($item->register, 3, '0', STR_PAD_LEFT) }}</td>
    </tr>
    <tr>
      <td><strong>Nama / Jenis Barang</strong></td>
      <td>{{ $item->kategori->uraian }}</td>
    </tr>
    <tr>
      <td><strong>Merk / Type</strong></td>
      <td>{{ $item->merk_type }}</td>
    </tr>
    <tr>
      <td><strong>Nomor SPCM</strong></td>
      <td>{{ $item->no_spcm }}</td>
    </tr>
    <tr>
      <td><strong>Bahan</strong></td>
      <td>{{ $item->bahan }}</td>
    </tr>
    <tr>
      <td><strong>Asal / Cara Perolehan</strong></td>
      <td>{{ ucfirst($item->asal) }}</td>
    </tr>
    <tr>
      <td><strong>Tahun Pembelian</strong></td>
      <td>{{ $item->tahun }}</td>
    </tr>
    <tr>
      <td><strong>Ukuran Barang / Konstruksi</strong></td>
      <td>{{ $item->ukuran_konstruksi }}</td>
    </tr>
    <tr>
      <td><strong>Satuan</strong></td>
      <td>{{ $item->satuan }}</td>
    </tr>
    <tr>
      <td><strong>Keadaan</strong></td>
      <td>{{ ['b' => 'Baik', 'kb' => 'Kurang Baik', 'rb' => 'Rusak Berat'][$item->keadaan] }}</td>
    </tr>
    <tr>
      <td><strong>Jumlah Barang</strong></td>
      <td>{{ $item->jumlah }}</td>
    </tr>
    <tr>
      <td><strong>Harga</strong></td>
      <td>Rp. {{ number_format($item->harga, 2, ',', '.') }} <br> {{ numspell($item->harga) }} Rupiah</td>
    </tr>
    <tr>
      <td><strong>Keterangan</strong></td>
      <td>{{ $item->keterangan }}</td>
    </tr>
  </table>
</div>
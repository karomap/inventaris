<div class="page-title">
  <div class="title_left">
    <h3 class="judul" data-current="daftar-aset">Daftar Aset</h3>
  </div>

  <div class="title_right">
    <div class="pull-right">
      <button class="btn btn-dark btn-sm" data-toggle="collapse" data-target="#boxFilter" title="Tampilkan/Sembunyikan Filter"><i class="fa fa-sort"></i> Filter</button>
      <a class="tambah-aset btn btn-dark btn-sm" href="{{ route('inventaris.baru') }}"><i class="fa fa-plus"></i> Tambah Baru</a>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<hr style="margin-top: 0">

<div id="boxFilter" class="collapse {{ isset($filter) ? 'in' : '' }}">
  {!! Form::model($filter, ['route' => 'inventaris.filter', 'id' => 'formFilter']) !!}
    <div class="row">
      <div class="col-md-4 col-xs-12">
        {!! Form::label('findkategori', 'Pencarian Nama / Jenis Barang') !!}
        <div class="input-group">
          {!! Form::text('findkategori', null, ['class' => 'form-control input-sm', 'placeholder' => 'Pencarian Kategori']) !!}
          <i class="fa fa-search input-group-addon"></i>
        </div>
      </div>
      <div class="col-md-4 col-xs-12">
        {!! Form::label('golongan', 'Golongan') !!}
        {!! Form::select('golongan', ['' => 'SEMUA GOLONGAN']+listKategori('golongan'), null, ['class' => 'form-control input-sm']) !!}
      </div>
      <div class="col-md-4 col-xs-12">
        {!! Form::label('bidang', 'Bidang') !!}
        {!! Form::select('bidang', !empty($filter['golongan']) ? listKategori('bidang', $filter['golongan']) : ['' => '-- Pilih Salah Satu --'], null, ['class' => 'form-control input-sm', empty($filter['golongan']) ? 'disabled' : '']) !!}
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-xs-12">
        {!! Form::label('kelompok', 'Kelompok') !!}
        {!! Form::select('kelompok', !empty($filter['bidang']) ? listKategori('kelompok', $filter['bidang']) : ['' => '-- Pilih Salah Satu --'], null, ['class' => 'form-control input-sm', empty($filter['bidang']) ? 'disabled' : '']) !!}
      </div>
      <div class="col-md-4 col-xs-12">
        {!! Form::label('subkelompok', 'Sub Kelompok') !!}
        {!! Form::select('subkelompok', !empty($filter['kelompok']) ? listKategori('subkelompok', $filter['kelompok']) : ['' => '-- Pilih Salah Satu --'], null, ['class' => 'form-control input-sm', empty($filter['kelompok']) ? 'disabled' : '']) !!}
      </div>
      <div class="col-md-4 col-xs-12">
        {!! Form::label('kat', 'Nama / Jenis Barang') !!}
        {!! Form::select('kat', !empty($filter['subkelompok']) ? listKategori('kat', $filter['subkelompok']) : ['' => '-- Pilih Salah Satu --'], null, ['class' => 'form-control input-sm', empty($filter['subkelompok']) ? 'disabled' : '']) !!}
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          {!! Form::text('keyword', null, ['class' => 'form-control input-sm', 'placeholder' => 'Pencarian Merk/Type']) !!}
          <a onclick="$('#formFilter').submit()" class="cari btn btn-default btn-sm input-group-addon"><i class="fa fa-search"></i></a>
        </div>
      </div>
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">Keadaan</span>
          {!! Form::select('keadaan', ['' => 'Semua', 'b' => 'Baik', 'kb' => 'Kurang Baik', 'rb' => 'Rusak Berat'], null, ['class' => 'form-control input-sm', 'onchange' => '$("#formFilter").submit()']) !!}
        </div>
      </div>
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">Urutkan</span>
          {!! Form::select('order', ['terbaru' => 'Terbaru', 'terlama' => 'Terlama' ,'typeA' => 'Merk/Type [A-Z]', 'typeZ' => 'Merk/Type [Z-A]', 'asal' => 'Asal', 'keadaan' => 'Keadaan'], null, ['class' => 'form-control input-sm', 'onchange' => '$("#formFilter").submit()']) !!}
        </div>
      </div>
      <div class="col-md-3 col-xs-12 text-right">
        <button type="reset" class="reset btn btn-default btn-sm"><i class="fa fa-refresh"></i> Setel Ulang</button>
        {!! Form::button('<i class="fa fa-filter"></i> Saring', ['class' => 'btn btn-warning btn-sm', 'form' => 'formFilter', 'type' => 'submit']) !!}
      </div>
    </div>
  {!! Form::close() !!}
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Jumlah : {{ $items->total() }}</h2>

        <ul class="nav navbar-right panel_toolbox">
          <li style="float: right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>

        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        @if($items->count() > 0)
        <div class="table-responsive">
          <table class="table table-hover table-condensed">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Nama/ Jenis Barang</th>
                <th>Merk/ Type</th>
                <th>Asal</th>
                <th>Tahun</th>
                <th>Keadaan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = $items->perPage() * ($items->currentPage() - 1) + 1;
                $total = 0;
              ?>
              @foreach($items as $item)
                <tr>
                  <td><span class="badge">{{ $no++ }}</span></td>
                  <td>{{ formatKode(str_pad($item->id_kategori, 10, '0', STR_PAD_LEFT)) }}</td>
                  <td>{{ str_pad($item->register, 3, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $item->kategori->uraian }}</td>
                  <td>{{ $item->merk_type }}</td>
                  <td>{{ ucfirst($item->asal) }}</td>
                  <td>{{ $item->tahun }}</td>
                  <td>{{ ['b' => 'Baik', 'kb' => 'Kurang Baik', 'rb' => 'Rusak Berat'][$item->keadaan] }}</td>
                  <td>{{ $item->jumlah }}</td>
                  <td class="text-right">Rp. {{ number_format($item->harga, 2, ',', '.') }}</td>
                  <td class="text-center">
                    @if(Auth::user()->isAdmin() || Auth::user()->id == $item->register)
                      {!! Form::model($item, ['route' => ['inventaris.hapus', $item], 'method' => 'delete', 'class' => 'form-inline']) !!}
                        <a class="preview btn btn-info btn-xs" data-href="{{ route('inventaris.detail', $item) }}" title="Detail"><i class="fa fa-eye"></i></a>
                        <a class="edit btn btn-success btn-xs" href="{{ route('inventaris.edit', $item) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'hapus btn btn-danger btn-xs', 'title' => 'Hapus', 'data-barang' => $item->merk_type]) !!}
                      {!! Form::close() !!}
                    @else
                      <a class="preview btn btn-info btn-xs" data-href="{{ route('inventaris.detail', $item) }}" title="Detail"><i class="fa fa-eye"></i></a>
                      <a class="edit btn btn-success btn-xs" href="{{ route('inventaris.edit', $item) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                    @endif
                  </td>
                </tr>
                <?php $total += $item->harga ?>
              @endforeach
            </tbody>
          </table>
        </div>

          <hr>
          <div class="pull-left">
            {{ $items->appends($filter)->links() }}
          </div>
          <div class="pull-right">
            <h2 class="badge">Total : Rp. {{ number_format($total, 2, ',', '.') }}</h2>
          </div>
        @else
          Tidak ada data.

          <script type="text/javascript">
            /**
            swal({
              title: 'Tidak ada data!',
              text: '',
              type: 'info',
              timer: 10000,
              showCloseButton: true,
              showConfirmButton: false,
            });
            **/
            new PNotify({
              title: 'Info!',
              type: 'info',
              text: 'Tidak ada data.',
              styling: 'bootstrap3'
            });
          </script>
        @endif
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@if(empty($filter['golongan']))
<script type="text/javascript">
  changeKategori('', $('[name=bidang]'), 'bidang');
</script>
@endif

<div class="page-title">
  <div class="title_left">
    <h3 class="judul" data-current="daftar-aset">Daftar Aset</h3>
  </div>
  <div class="pull-right">
    <a class="btn btn-dark btn-sm" href="{{ route('inventaris.baru') }}"><i class="fa fa-plus"></i> Tambah Baru</a>
  </div>
</div>
<div class="clearfix"></div>
<hr style="margin-top: 0">

<div class="row">
  <div class="col-xs-12">
    {!! Form::model($filter, ['route' => 'inventaris.filter', 'id' => 'formFilter', 'class' => 'form-inline']) !!}
        {!! Form::select('golongan', ['' => 'SEMUA GOLONGAN']+listKategori('golongan'), null, ['class' => 'form-control input-sm']) !!}
        {!! Form::select('bidang', !empty($filter['golongan']) ? listKategori('bidang', $filter['golongan']) : ['' => ''], null, ['class' => 'form-control input-sm']) !!}
        {!! Form::select('kelompok', !empty($filter['bidang']) ? listKategori('kelompok', $filter['bidang']) : ['' => ''], null, ['class' => 'form-control input-sm']) !!}
        {!! Form::button('<i class="fa fa-filter"></i> Filter', ['class' => 'btn btn-dark btn-sm pull-right', 'type' => 'submit']) !!}
    {!! Form::close() !!}
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Asset</h2>

        <ul class="nav navbar-right panel_toolbox">
          <li><a>Jumlah : {{ $items->total() }}</a></li>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>

        <div class="clearfix"></div>
      </div>
      
      <div class="x_content">
        @if($items->count() > 0)
        <div class="table-responsive">
          <table class="table table-hover">
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
                        <a class="btn btn-success btn-xs" href="{{ route('inventaris.edit', $item) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'hapus btn btn-danger btn-xs', 'title' => 'Hapus', 'data-barang' => $item->merk_type]) !!}
                      {!! Form::close() !!}
                    @else
                      <a class="preview btn btn-info btn-xs" data-href="{{ route('inventaris.detail', $item) }}" title="Detail"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-success btn-xs" href="{{ route('inventaris.edit', $item) }}" title="Edit"><i class="fa fa-pencil"></i></a>
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
          
          @push('scripts')
            <script type="text/javascript">
              new PNotify({
                  title: 'Error!',
                  text: 'Tidak ada data.',
                  type: 'error',
                  styling: 'bootstrap3'
              });
            </script>
          @endpush
        @endif
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  ajaxlink();

  changeKategori($('[name=golongan]').val(), $('[name=bidang]'), 'bidang');

@if(!empty($filter['golongan']))
  changeKategori({{ $filter['golongan'] }}, $('[name=bidang]'), 'bidang');
@endif

@if(!empty($filter['bidang']))
  changeKategori({{ $filter['bidang'] }}, $('[name=kelompok]'), 'kelompok');
@endif

  $('[name=golongan]').change(function(){
    changeKategori($(this).val(), $('[name=bidang]'), 'bidang');
  });

  $('[name=bidang]').change(function(){
    changeKategori($(this).val(), $('[name=kelompok]'), 'kelompok');
  });

  $('[name=kelompok]').change(function(){
    $('#formFilter').submit();
  });

  $('.preview').each(function(){
    $(this).click(function(){
      BootstrapDialog.show({
        type: BootstrapDialog.TYPE_INFO,
        title: '<i class="fa fa-eye fa-fw"></i> Detail Asset',
        message: function(dialog) {
          var $message = $('<div></div>');
          var pageToLoad = dialog.getData('pageToLoad');
          $message.load(pageToLoad);

          return $message;
        },
        data: {
          'pageToLoad': $(this).data('href')
        }
      });
    });
  });

  $('.hapus').each(function(){
    $(this).click(function(){
      var form = $(this).parents('form'),
          barang = $(this).data('barang');

      swal({
        title: 'Apakah Anda yakin?',
        text: "Anda akan menghapus data "+barang+"<br>Data yang dihapus tidak dapat dikembalikan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#D9534F',
        cancelButtonColor: '#394D5F',
        confirmButtonText: 'Ya, hapus data ini!',
        cancelButtonText: 'Batal'
      }).then(function(isConfirm) {
        if (isConfirm) {
          form.submit();
        }
      })
    });
  });
</script>

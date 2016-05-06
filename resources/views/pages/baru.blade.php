<div class="page-title">
  <div class="title_left">
    <h3 class="judul" data-current="aset-baru">Aset Baru</h3>
  </div>
  <div class="pull-right">
  </div>
</div>
<div class="clearfix"></div>
<hr style="margin-top: 0">

<div class="row">
  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Input Asset Baru</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        {!! Form::open(['route' => 'inventaris.baru', 'id' => 'formAset', 'class' => 'form-vertical']) !!}

        @include('pages._form')

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-xs-12">
              <a href="{{ route('inventaris.index') }}" class="batal btn btn-default btn-sm"><i class="fa fa-times"></i> Batal</a>
              {!! Form::button('<i class="fa fa-save"></i> Simpan', ['class' => 'simpan btn btn-success btn-sm']) !!}
            </div>
          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

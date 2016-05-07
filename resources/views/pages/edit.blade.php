<script type="text/javascript">
  if (document.getElementsByClassName("right_col").length < 1) {
    document.location.replace('/');
  }
</script>

<div class="page-title">
  <div class="title_left">
    <h3 class="judul">Edit Aset</h3>
  </div>
  <div class="pull-right">
    <a class="kembali btn btn-dark btn-sm" href="{{ route('inventaris.index') }}"><i class="fa fa-angle-double-left"></i> Kembali</a>
  </div>
</div>
<div class="clearfix"></div>
<hr style="margin-top: 0">

<div class="row">
  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Data Asset</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        {!! Form::model($item, ['route' => ['inventaris.update', $item], 'method' => 'patch', 'id' => 'formAset', 'class' => 'form-vertical']) !!}

        @include('pages._form', ['model' => $item])

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-xs-12">
              <a href="{{ route('inventaris.index') }}" class="batal btn btn-default btn-sm"><i class="fa fa-times"></i> Batal</a>
              {!! Form::button('<i class="fa fa-refresh"></i> Perbarui', ['class' => 'simpan btn btn-success btn-sm']) !!}
            </div>
          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

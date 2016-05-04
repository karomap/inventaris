<div class="form-group {{ $errors->has('id_kategori') ? 'has-error' : '' }}">
  {!! Form::label('id_kategori', 'Nama / Jenis Barang') !!}
  {!! Form::textarea('kategoris', isset($model) ? $model->kategori->parent('list') : null, ['class' => 'form-control input-sm', 'id' => 'kategoris', 'disabled', 'placeholder' => 'Nama / Jenis Barang belum dipilih', 'rows' => '3']) !!}
  {!! Form::hidden('id_kategori', null) !!}
  {!! $errors->first('id_kategori', '<p class="help-blok">:message</p>') !!}

  <br>

  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel">
      <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h4 class="panel-title">
          Pencarian Nama / Jenis Barang
          <i class="pull-right fa fa-chevron-down"></i>
        </h4>
      </a>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="input-group"> 
            {!! Form::text('findkategori', null, ['class' => 'form-control input-sm', 'placeholder' => 'Pencarian']) !!}
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="panel">
      <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <h4 class="panel-title">
          Pilih Manual Nama / Jenis Barang
          <i class="pull-right fa fa-chevron-down"></i>
        </h4>
      </a>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6 col-xs-12">
              {!! Form::select('golongan', ['' => '-- Pilih Golongan --']+listKategori('golongan'), null, ['class' => 'form-control input-sm']) !!}
              <p class="help-blok">Golongan</p>
            </div>
            <div class="col-md-6 col-xs-12">
              {!! Form::select('bidang', ['' => ''], null, ['class' => 'form-control input-sm']) !!}
              <p class="help-blok">Bidang</p>
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-6 col-xs-12">
              {!! Form::select('kelompok', ['' => ''], null, ['class' => 'form-control input-sm']) !!}
              <p class="help-blok">Kelompok</p>
            </div>
            <div class="col-md-6 col-xs-12">
              {!! Form::select('subkelompok', ['' => ''], null, ['class' => 'form-control input-sm']) !!}
              <p class="help-blok">Sub Kelompok</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-xs-12">
              {!! Form::select('kat', ['' => ''], null, ['class' => 'form-control input-sm']) !!}
              <p class="help-blok">Nama / Jenis Barang</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group {{ $errors->has('merk_type') ? 'has-error' : '' }}">
  {!! Form::label('merk_type', 'Merk / Type') !!}
  {!! Form::text('merk_type', null, ['class' => 'form-control input-sm']) !!}
  {!! $errors->first('merk_type', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('no_spcm') ? 'has-error' : '' }}">
  {!! Form::label('no_spcm', 'No. Sertifikat / No. Pabrik / No. Chasis / No. Mesin') !!}
  {!! Form::text('no_spcm', null, ['class' => 'form-control input-sm']) !!}
  {!! $errors->first('no_spcm', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('bahan') ? 'has-error' : '' }}">
  {!! Form::label('bahan', 'Bahan') !!}
  {!! Form::text('bahan', null, ['class' => 'form-control input-sm']) !!}
  {!! $errors->first('bahan', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('asal') ? 'has-error' : '' }}">
  {!! Form::label('asal', 'Asal / Cara Perolehan') !!}
  <div class="clearfix"></div>
  <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary btn-sm {{ isset($model) && $model->asal == 'pembelian' ? 'active' : '' }}">
      {!! Form::radio('asal', 'pembelian') !!} Pembelian
    </label>
    <label class="btn btn-primary btn-sm {{ isset($model) && $model->asal == 'hibah' ? 'active' : '' }}">
      {!! Form::radio('asal', 'hibah') !!} Hibah
    </label>
  </div>
  {!! $errors->first('asal', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
  {!! Form::label('tahun', 'Tahun Pembelian') !!}
  {!! Form::text('tahun', null, ['class' => 'form-control input-sm yearpicker', 'readonly']) !!}
  {!! $errors->first('tahun', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('ukuran_konstruksi') ? 'has-error' : '' }}">
  {!! Form::label('ukuran_konstruksi', 'Ukuran / Konstruksi') !!}
  {!! Form::text('ukuran_konstruksi', null, ['class' => 'form-control input-sm']) !!}
  {!! $errors->first('ukuran_konstruksi', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('satuan') ? 'has-error' : '' }}">
  {!! Form::label('satuan', 'Satuan') !!}
  {!! Form::text('satuan', null, ['class' => 'form-control input-sm']) !!}
  {!! $errors->first('satuan', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('keadaan') ? 'has-error' : '' }}">
  {!! Form::label('keadaan', 'Keadaan') !!}
  <div class="clearfix"></div>
  <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-primary btn-sm {{ isset($model) && $model->keadaan == 'b' ? 'active' : '' }}">
      {!! Form::radio('keadaan', 'b') !!} Baik
    </label>
    <label class="btn btn-primary btn-sm {{ isset($model) && $model->keadaan == 'kb' ? 'active' : '' }}">
      {!! Form::radio('keadaan', 'kb') !!} Kurang Baik
    </label>
    <label class="btn btn-primary btn-sm {{ isset($model) && $model->keadaan == 'rb' ? 'active' : '' }}">
      {!! Form::radio('keadaan', 'rb') !!} Rusak Berat
    </label>
  </div>
  {!! $errors->first('keadaan', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
  {!! Form::label('jumlah', 'Jumlah Barang') !!}
  {!! Form::number('jumlah', null, ['class' => 'form-control input-sm']) !!}
  {!! $errors->first('jumlah', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
  {!! Form::label('harga', 'Jumlah Harga') !!}
  <div class="input-group">
    <span class="input-group-addon">Rp.</span>
    {!! Form::number('harga', null, ['class' => 'form-control input-sm']) !!}
  </div>
  {!! $errors->first('harga', '<p class="help-blok">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
  {!! Form::label('keterangan', 'Keterangan') !!}
  {!! Form::textarea('keterangan', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
  {!! $errors->first('keterangan', '<p class="help-blok">:message</p>') !!}
</div>

@push('scripts')
<script type="text/javascript">
  //$('.manual').hide();
</script>
<script type="text/javascript" src="{{ asset('js/input.js') }}"></script>
@endpush
<div class="form-group">
  {!! Form::label('id_kategori', 'Nama / Jenis Barang') !!}
  {!! Form::textarea('kategoris', isset($model) ? $model->kategori->parent('list') : null, ['class' => 'form-control input-sm', 'id' => 'kategoris', 'disabled', 'placeholder' => 'Nama / Jenis Barang belum dipilih', 'rows' => '3']) !!}
  {!! Form::hidden('id_kategori', null) !!}
  <span class="help-block"></span>

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

<div class="form-group">
  {!! Form::label('merk_type', 'Merk / Type') !!}
  {!! Form::text('merk_type', null, ['class' => 'form-control input-sm']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('no_spcm', 'No. Sertifikat / No. Pabrik / No. Chasis / No. Mesin') !!}
  {!! Form::text('no_spcm', null, ['class' => 'form-control input-sm']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('bahan', 'Bahan') !!}
  {!! Form::text('bahan', null, ['class' => 'form-control input-sm']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
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
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('tahun', 'Tahun Pembelian') !!}
  {!! Form::text('tahun', null, ['class' => 'form-control input-sm yearpicker', 'readonly']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('ukuran_konstruksi', 'Ukuran / Konstruksi') !!}
  {!! Form::text('ukuran_konstruksi', null, ['class' => 'form-control input-sm']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('satuan', 'Satuan') !!}
  {!! Form::text('satuan', null, ['class' => 'form-control input-sm']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
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
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('jumlah', 'Jumlah Barang') !!}
  {!! Form::number('jumlah', null, ['class' => 'form-control input-sm']) !!}
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('harga', 'Jumlah Harga') !!}
  <div class="input-group">
    <span class="input-group-addon">Rp.</span>
    {!! Form::number('harga', null, ['class' => 'form-control input-sm']) !!}
  </div>
  <span class="help-block"></span>
</div>

<div class="form-group">
  {!! Form::label('keterangan', 'Keterangan') !!}
  {!! Form::textarea('keterangan', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
  <span class="help-block"></span>
</div>

<script type="text/javascript" src="{{ asset('js/input.js') }}"></script>
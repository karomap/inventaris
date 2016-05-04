@extends('layouts.app')

@section('title', 'Edit Asset')

@section('content')
<div class="row">
  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Data Asset</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        {!! Form::model($item, ['route' => ['inventaris.update', $item], 'method' => 'patch', 'class' => 'form-vertical']) !!}

        @include('pages._form', ['model' => $item])

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-xs-12">
              <a href="{{ route('inventaris.index') }}" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Batal</a>
              {!! Form::button('<i class="fa fa-refresh"></i> Perbarui', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
            </div>
          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
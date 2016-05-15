@extends('layouts.login')

@section('content')
  {!! Form::open(['url' => '/login']) !!}
    <h1>Login Pengguna</h1>

    @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <div>
      {!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Email']) !!}
    </div>
    <div>
      {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => 'Password']) !!}
    </div>
    <div>
      <!-- <a href="{{ url('/register') }}">Daftar</a> -->
      {!! Form::button('Masuk', ['class' => 'btn btn-default submit', 'type' => 'submit']) !!}
    </div>
    <div class="clearfix"></div>
    <br />
    <div>
      <h1><i class="fa fa-cubes" style="font-size: 26px;"></i> SIMAS</h1>

      <p>Sistem Informasi Manajemen Aset</p>
      <p>©2016 All Rights Reserved.</p>
    </div>
  {!! Form::close() !!}
@endsection

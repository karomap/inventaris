@extends('layouts.login')

@section('content')
  {!! Form::open(['url' => '/login']) !!}
    <h1>Login Pengguna</h1>
    <div>
      {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div>
      {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="checkbox">
      <label>
          <input type="checkbox" name="remember"> Ingat saya
      </label>
    </div>
    <div>
      <a href="{{ url('/register') }}">Daftar</a>
      {!! Form::button('Masuk', ['class' => 'btn btn-default submit', 'type' => 'submit']) !!}
    </div>
    <div class="clearfix"></div>
    <br />
    <div>
      <h1><i class="fa fa-cubes" style="font-size: 26px;"></i> Inventaris</h1>

      <p>©2016 All Rights Reserved. Powered by Laravel 5</p>
    </div>
  {!! Form::close() !!}
@endsection

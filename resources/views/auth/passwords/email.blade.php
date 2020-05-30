@extends('auth.master')

@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Recuperar Contraseña</p>
            {{ Form::open(['route' => 'password.emaill', 'method'=>'POST']) }}
            {{ csrf_field() }}
            <div class="input-group mb-3">
                {{ Form::text('email', null, ['required' => "required", 'placeholder' => 'Correo Electronico', 'class'=>'form-control']) }}
                <div class="input-group-append">
                    <span class="fa fa-envelope input-group-text"></span> @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{form::submit('Recuperar', array('class'=> 'btn btn-primary btn-md btn-block'))}}
                    </div>
                </div>
                {{ Form::close() }}
                <br>
                <p class="mb-1">
                    <a href="{{ url('/login') }}">Iniciar Sesión</a>
                </p>
            </div>
        </div>
    @endsection

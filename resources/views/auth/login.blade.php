@extends('auth.master')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ingrese sus datos para iniciar sesión</p>
            {{ Form::open(['route' => 'login', 'method'=>'POST']) }}
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
                <div class="input-group mb-3">
                    {{ Form::password('password', ['required' => "required", 'placeholder'=>'Contraseña', 'class'=>'form-control']) }}
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{form::submit('Iniciar Sesión', array('class'=> 'btn btn-primary btn-md btn-block'))}}
                        </div>
                    </div>
                    {{ Form::close() }}
                    <br>
                    <p class="mb-1">
                        <a href="{{ url('/password/reset') }}">Olvidé mi contraseña</a>
                    </p>
                    <p class="mb-1">
                        <a href="{{ url('/register') }}">Nuevo Usuario</a>
                    </p>
                </div>
            </div>
        @endsection

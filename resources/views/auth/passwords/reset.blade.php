@extends('auth.master')

@section('title', 'Restablecer Contraseña')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Restablecer Contraseña</p>
            {{ Form::open(['route' =>'password.resett', 'method'=>'POST']) }}
            {{ Form::hidden('token', $token) }}
            {{ csrf_field() }}
            <div class="input-group mb-3">
                {{ Form::text('email', $email, ['required' => "required", 'placeholder' => 'Correo Electronico', 'class'=>'form-control']) }}
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
                    <div class="input-group mb-3">
                        {{ Form::password('password_confirmation', ['required' => "required", 'placeholder'=>'Vuelva a escribir la contraseña', 'class'=>'form-control']) }}
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{form::submit('Restablecer', array('class'=> 'btn btn-primary btn-md btn-block'))}}
                            </div>
                        </div>
                        {{ Form::close() }}
                        <br>
                        <p class="mb-1">
                            <a href="{{ url('/login') }}">Iniciar Sesión</a>
                        </p>
                        <br>
                    </div>
                </div>
            @endsection

@extends('layouts.master')

@section('title', 'Ajustes')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="m-0 text-dark">Ajustes <small></small></h1>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a data-toggle="modal" data-target="#ayuda" href="#">Ayuda</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if(Auth::User()->nombre == NULL || $edit != NULL)
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        @else
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @endif
        <div class="card">
            <div class="card-header no-border">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Datos del Usuario</h3>
                </div>
            </div>
            <div class="card-body">
                <strong><i class="fas fa-user mr-1"></i>Nombre</strong>
                <p class="text-muted">{{ Auth::User()->name }}</p>
                <hr>
                <strong><i class="fas fa-mail mr-1"></i>Correo Electronico</strong>
                <p class="text-muted">{{ Auth::User()->email }}</p>
            </div>
        </div>
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Datos de la Organización</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool">
                                <a href="{{ route('organizador.ajustes',[Auth::User()->id]) }}" style="color:inherit"><i class="fas fa-edit fa-lg"></i></a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Auth::User()->nombre != NULL)
                        <strong><i class="fas fa-gift mr-1"></i>Nombre de la Organización</strong>
                        <p class="text-muted">{{ Auth::User()->nombre }}</p>
                        <hr>
                        <strong><i class="fas fa-bars mr-1"></i>Tipo de Organización</strong>
                        <p class="text-muted">{{ Auth::User()->categoria }}</p>
                        <hr>
                        <strong><i class="fas fa-home mr-1"></i>Direccion</strong>
                        <p class="text-muted">{{ Auth::User()->direccion }}</p>
                        <hr>
                        <strong><i class="fas fa-phone mr-1"></i>Telefono</strong>
                        <p class="text-muted">{{ Auth::User()->telefono }}</p>
                        <hr>
                        <strong><i class="fas fa-user mr-1"></i>Cargo</strong>
                        <p class="text-muted">{{ Auth::User()->cargo }}</p>
                        <hr>
                        <strong><i class="fas fa-certificate mr-1"></i>Certificado</strong>
                        <p class="text-muted"><a href="{{ url(Auth::User()->certificado) }}" style="color:inherit;">Ver Certificado</a></p>
                        <hr>
                        <strong><i class="fas fa-user-circle mr-1"></i>Validación de Cuenta</strong>
                        <p class="text-muted">{{ Auth::User()->valido ? "Cuenta Validada" : "Validación de cuenta en Proceso"}}</p>
                    @else
                        <div><br><p class="text-center">No existen datos cargados</p><br></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if(Auth::User()->nombre == NULL)
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Cargar Datos de la Organización</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                {{ Form::open(['route' => 'organizador.ajustes.guardar', 'method'=>'POST', 'files'=> true]) }}
                                {{ Form::label('', "Nombre de la Organización *") }}
                                {{ Form::text('nombre', null, ['required' => "required", 'placeholder' => 'Los Piletones', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('categoria', "Tipo de Organización *") }}
                                {{ Form::select('categoria', ['ONG'=>'ONG', 'Comedor Barrial'=>'Comedor Barrial'], null, ['required' => 'required', 'placeholder' => 'Selecciona un Tipo', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Direccion de la Organización *") }}
                                {{ Form::text('direccion', null, ['required' => "required", 'placeholder' => 'Calle 1234, Barrio 31, CABA.', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Telefono *") }}
                                {{ Form::text('telefono', null, ['required' => "required", 'placeholder' => '+54 911 1234 1234', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Cargo Perosna *") }}
                                {{ Form::text('cargo', null, ['required' => "required", 'placeholder' => 'Organizador', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Estatuto o Alta Municipal *") }}
                                <br>
                                {{ Form::file('file', array()) }}
                                <br>
                                <br>
                                {{ Form::submit('Guardar', array('class'=> 'btn btn-success btn-lg btn-block')) }}
                                {{ Html::linkRoute('organizador.ajustes', 'Cancelar', null, array('class' => 'btn btn-danger btn-lg btn-block')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
            @elseif($edit != null)
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Editar Datos de la Organización</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                {{ Form::model($edit, ['route' =>['organizador.ajustes.actualizar'], 'method'=>'POST']) }}

                                {{ Form::label('', "Nombre de la Organización *") }}
                                {{ Form::text('nombre', null, ['required' => "required", 'placeholder' => 'Los Piletones', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('categoria', "Tipo de Organización *") }}
                                {{ Form::select('categoria', ['ONG'=>'ONG', 'Comedor Barrial'=>'Comedor Barrial'], null, ['required' => 'required', 'placeholder' => 'Selecciona un Tipo', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Direccion de la Organización *") }}
                                {{ Form::text('direccion', null, ['required' => "required", 'placeholder' => 'Calle 1234, Barrio 31, CABA.', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Telefono *") }}
                                {{ Form::text('telefono', null, ['required' => "required", 'placeholder' => '+54 911 1234 1234', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Cargo Perosna *") }}
                                {{ Form::text('cargo', null, ['required' => "required", 'placeholder' => 'Organizador', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::submit('Guardar', array('class'=> 'btn btn-success btn-lg btn-block')) }}
                                {{ Html::linkRoute('organizador.ajustes', 'Cancelar', null, array('class' => 'btn btn-danger btn-lg btn-block')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if(Auth::User()->nombre == NULL)
        <!-- Start - Bienvenida Modal -->
        <div class="modal fade" id="bienbenida" style="display: block;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bienvenido a 3 Deseos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Antes que nada necesitamos que cargues los datos de tu Organización!</p>
                        <p>Luego nuestro equipo va a verificar estos datos, y si esta todo bien, vas  apoder empezar a utilizar la plataforma.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End - Bienvenida Modal -->
    @endif

    <!-- Ayuda -->
    <div class="modal show" id="ayuda" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ayuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Aca te vamos a explicar todo lo que no entiendas....</p>
                </div>
            </div>
        </div>
    </div>

@endsection

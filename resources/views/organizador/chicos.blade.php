@extends('layouts.master')

@section('title', 'Chic@s')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="m-0 text-dark">Tus Niñ@s <small></small></h1>
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
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Niñ@s Activos</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count(Auth::User()->chicosActivos))
                            <table id="table1" class="table table-hover nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th class="text-center">Fecha Nacimiento</th>
                                        <th class="text-center">Edad</th>
                                        <th>Gustos</th>
                                        <th>Observaciones</th>
                                        <th class="text-center" style="width: 80px;">Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::User()->chicosActivos as $chico)
                                        <tr>
                                            <td>{{ $chico->nombre }}</td>
                                            <td class="text-center">{{ date("d/m/Y", strtotime($chico->fecha_nacimiento)) }} </td>
                                            <td class="text-center">{{ $chico->edad() }}</td>
                                            <td class="text-center">{{ $chico->gusto->nombre }}</td>
                                            <td class="text-center">{{ $chico->observaciones}}</td>
                                            <td class="text-center"><a href="{{ route('organizador.chico.eliminar', $chico->id) }}" onclick="return confirm('{{nickname()}} estas seguro que desea desactivar el chic@ {{$chico->nombre}} ?');" style="color:inherit;"><i class="fa fa-times fa-lg"></i></a></td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div><br><p class="text-center">No Existen Chicos Cargados</p><br></div>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Niñ@s Inactivos</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count(Auth::User()->chicosInactivos))
                            <table id="table2" class="table table-hover nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th class="text-center">Fecha Nacimiento</th>
                                        <th class="text-center">Edad</th>
                                        <th>Gustos</th>
                                        <th>Observaciones</th>
                                        <th class="text-center" style="width: 80px;">Activar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::User()->chicosInactivos as $chico)
                                        <tr>
                                            <td>{{ $chico->nombre }}</td>
                                            <td class="text-center">{{ date("d/m/Y", strtotime($chico->fecha_nacimiento)) }} </td>
                                            <td class="text-center">{{ $chico->edad() }}</td>
                                            <td class="text-center">{{ $chico->gusto->nombre }}</td>
                                            <td class="text-center">{{ $chico->observaciones}}</td>
                                            <td class="text-center"><a href="{{ route('organizador.chico.activar', $chico->id) }}" onclick="return confirm('{{nickname()}} estas seguro que desea activar el chic@ {{$chico->nombre}} ?');" style="color:inherit;"><i class="fa fa-check fa-lg"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div><br><p class="text-center">No Existen Chicos Cargados</p><br></div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Agregar Niñ@s</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                {{ Form::open(['route' => 'organizador.chico.guardar', 'method'=>'POST']) }}

                                {{ Form::label('', "Nombre *") }}
                                {{ Form::text('nombre', null, ['required' => "required", 'placeholder' => 'Ana Copi', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('fecha', "Fecha de Nacimiento *") }}
                                {{ Form::text('fecha', null, ['required' => "required", 'class'=>'fecha form-control']) }}
                                <br>
                                {{ Form::label('', "Gustos *") }}
                                {{ Form::select('categoria_id', $ddCategorias, null, ['required' => 'required', 'placeholder' => 'Selecciona un Gusto', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Observaciones") }}
                                {{ Form::textarea('observaciones', null, ['placeholder' => 'Ej: Discapacidades, celiaquía, alergias, etc', 'size' => 'x3', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::submit('Guardar', array('class'=> 'btn btn-success btn-lg btn-block')) }}

                                {{ Html::linkRoute('organizador.chicos', 'Cancelar', null, array('class' => 'btn btn-danger btn-lg btn-block')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ayuda -->
        <div class="modal fade" id="ayuda" style="display: none;" aria-hidden="true">
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

@section('javascript')

    {{--  Flatpickr  --}}
    <script>
    $("#fecha").flatpickr({
        maxDate: "today",
        dateFormat: "d-m-Y",
        locale: 'es'
    });
    </script>

    {{--  Data Tables  --}}

    <script>
    $(document).ready(function() {
        $('#table1').DataTable( {
            "columnDefs": [
                { "orderable": false, "targets": [5] }
            ],
            "order": [[0, 'asc' ]],
            "language": {
                "search": "Buscar:",
            },
            "dom": "bfrt",
        } );
        $('#table2').DataTable( {
            "columnDefs": [
                { "orderable": false, "targets": [5] }
            ],
            "order": [[0, 'asc' ]],
            "language": {
                "search": "Buscar:",
            },
            "dom": "bfrt",
        } );
    } );
    </script>
@endsection

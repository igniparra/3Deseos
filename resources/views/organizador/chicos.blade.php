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
                            <h3 class="card-title">Niñ@s Cargados</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count(Auth::User()->chicos))
                            <table id="table" class="table table-hover nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th class="text-center">Fecha de Nacimiento</th>
                                        <th class="text-center">Edad</th>
                                        <th>Gustos</th>
                                        <th class="text-center" style="width: 80px;">Eliminar</th>
                                        <th class="text-center" style="width: 80px;">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::User()->chicos as $chico)
                                        <tr>
                                            <td>{{ $chico->nombre }}</td>
                                            <td class="text-center">{{ date("d/m/Y", strtotime($chico->fecha_nacimiento)) }} </td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">{{ $chico->gusto->nombre }}</td>
                                            <td class="text-center"><a href="{{ route('organizador.chico.eliminar', $chico->id) }}" onclick="return confirm('{{nickname()}} estas seguro que desea eliminar el chic@ {{$chico->nombre}} ?');" style="color:inherit;"><i class="fa fa-trash fa-lg"></i></a></td>
                                            <td class="text-center"><a href="{{ route('organizador.chico.ver', $chico->id) }}" style="color:inherit;"><i class="fa fa-eye fa-lg"></i></a></td>
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
                                {{ Form::label('', "Genero *") }}
                                {{ Form::select('genero_id', $ddGeneros, null, ['required' => 'required', 'placeholder' => 'Selecciona un Genero', 'class'=>'form-control']) }}
                                <br>
                                {{ Form::label('', "Gustos *") }}
                                {{ Form::select('categoria_id', $ddCategorias, null, ['required' => 'required', 'placeholder' => 'Selecciona un Gusto', 'class'=>'form-control']) }}
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
        $('#table').DataTable( {
            "columnDefs": [
                { "orderable": false, "targets": [1,4,5] }
            ],
            "order": [[ 0, 'asc' ]],
            "scrollX": true,
            "language": {
                "zeroRecords": "No existen Registros",
                "search": "Buscar:",
            },
            "pageLength": 1000,
            "dom": '<<f><t>>',
            //"responsive":true,
            //"dom": 'f<<t>p>',
            //"dom": '<"top"f>rt<"bottom"p><"clear">'
        } );
    } );
    </script>
@endsection

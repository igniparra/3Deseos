@extends('layouts.master')

@section('title', 'Chic@s')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="m-0 text-dark">Cajas para Controlar<small></small></h1>
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Cajas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(count(Auth::User()->cajasControlar()))
                            <table id="table" class="table table-hover nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Donante</th>
                                        <th>Niñ@</th>
                                        <th>Gusto</th>
                                        <th>Observacion</th>
                                        <th  class="text-center" colspan="2">Controlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::User()->cajasControlar() as $caja)
                                        <tr>
                                            <td>{{ sprintf('%04d', $caja->id) }}</td>
                                            <td>{{ $caja->donante->name }}</td>
                                            <td>{{ $caja->chico->nombre }}</td>
                                            <td>{{ $caja->chico->gusto->nombre }}</td>
                                            <td>{{ $caja->chico->observaciones }}</td>
                                            <td>{{ Html::linkRoute('organizador.caja.validar', 'Validar', [$caja->id], array('class' => 'btn btn-success', 'onclick'=>"return confirm('Estas segur@ que la caja SI cumple todos los siquientes requerimientos? \\n No objetos punzantes \\n No alimentos vencidos, sólo alimentos cerrados al vacío \\n No químicos ni tóxicos \\n No objetos pequeños \\n No fármacos \\n No explosivos ni inflamables (ej. bengalas o encendedor) \\n No basuras ni residuos')")) }}</td>
                                            <td>{{ Html::linkRoute('organizador.caja.reportar', 'Reportar', [$caja->id], array('class' => 'btn btn-danger', 'onclick'=>"return confirm('Estas segur@ que la caja NO cumple alguno de los siquientes requerimientos? \\n No objetos punzantes \\n No alimentos vencidos, sólo alimentos cerrados al vacío \\n No químicos ni tóxicos \\n No objetos pequeños \\n No fármacos \\n No explosivos ni inflamables (ej. bengalas o encendedor) \\n No basuras ni residuos')")) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div><br><p class="text-center">No Existen Cajas Cargadas</p><br></div>
                        @endif
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
                        <p>Una vez que la caja está lista, el donante la envía a tu organización y debes controlar que todo lo que está dentro de la caja es correcto.<br><br>
                            Eso es lo que vas a hacer en esta pantalla. Presiona "validar" para que aparezca el listado de todo lo que tienes que controlar.<br><br>
                            Si todo está bien, presionas "OK"; sino, presionas "Cancelar" y procedes a "Reportar" la caja haciendo click en "Reportar" y luego "OK". </p>
                    </div> 
                </div>
            </div>
        </div>
@endsection

@section('javascript')




    {{--  Data Tables  --}}
    <script>
    $(document).ready(function() {
        $('#table').DataTable( {
            "columnDefs": [
                { "orderable": false, "targets": [] }
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

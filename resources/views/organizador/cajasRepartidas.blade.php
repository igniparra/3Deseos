@extends('layouts.master')

@section('title', 'Cajas Repartidas')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="m-0 text-dark">Cajas Repartidas<small></small></h1>
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
                        @if(count(Auth::User()->cajasRepartidas()))
                            <table id="table" class="table table-hover nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Estado</th>
                                        <th>Donante</th>
                                        <th>Niñ@</th>
                                        <th>Gusto</th>
                                        <th>Observacion</th>
                                        <th>Foto o Video</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::User()->cajasRepartidas() as $caja)
                                        <tr>
                                            <td>{{ sprintf('%04d', $caja->id) }}</td>
                                            <td>{{ $caja->estado->nombre }} </td>
                                            <td>{{ $caja->donante->name }}</td>
                                            <td>{{ $caja->chico->nombre }}</td>
                                            <td>{{ $caja->categoria->nombre }}</td>
                                            <td>{{ $caja->chico->observaciones }}</td>
                                            <td>
                                                @foreach ($caja->archivos as $archivo)
                                                    <a href="{{ url($archivo->url) }}" target="_blank" style="color:inherit;"><i class="fas fa-file-image fa-lg"></i> </a>
                                                @endforeach

                                            </td>
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
                        <p>Aca te vamos a explicar todo lo que no entiendas....</p>
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

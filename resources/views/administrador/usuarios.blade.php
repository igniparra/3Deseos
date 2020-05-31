@extends('administrador.layouts.master')

@section('title', 'Usuarios')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="m-0 text-dark">Administracion <small>Usuarios</small></h1>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ayuda</a></li>
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
                        <h3 class="card-title">Usuarios Activos</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($usuarios))
                        <table id="usuariosActivos" class="table table-hover table-striped nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Mail</th>
                                    <th class="text-center">Admin</th>
                                    <th class="text-center">Org</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center" style="width: 80px;">LastLogIn</th>
                                    <th class="text-center" style="width: 80px;">ResetPass</th>
                                    <th class="text-center" style="width: 80px;">Editar</th>
                                    <th class="text-center" style="width: 80px;">Desactivar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td><img class="img img-circle" src="{{URL::asset($usuario->img)}}" width="50"></td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="text-center"><a href="{{ route('administrador.usuarioRol', [$usuario->id, 'rol'=>1, 'es'=>$usuario->hasRole('administrador')]) }}" style="color:inherit;"> {!! $usuario->hasRole('administrador') ? "<i class='fa fa-check'>&zwnj;</i>" : "<i class='fa fa-times'></i>"!!}</a></td>
                                        <td class="text-center"><a href="{{ route('administrador.usuarioRol', [$usuario->id, 'rol'=>2, 'es'=>$usuario->hasRole('organizador')]) }}" style="color:inherit;">{!! $usuario->hasRole('organizador') ? "<i class='fa fa-check'>&zwnj;</i>" : "<i class='fa fa-times'></i>"!!}</a></td>
                                        <td class="text-center"><a href="{{ route('administrador.usuarioRol', [$usuario->id, 'rol'=>3, 'es'=>$usuario->hasRole('usuario')]) }}" style="color:inherit;">{!! $usuario->hasRole('usuario') ? "<i class='fa fa-check'>&zwnj;</i>" : "<i class='fa fa-times'></i>"!!}</a></td>
                                        <td class="text-center" data-toggle="tooltip" title="{{ date('d/m/y - H:i' , strtotime($usuario->last_logIn)) }}"><i class="fa fa-info-circle fa-lg"></i></td>
                                        <td class="text-center"><a href="{{ route('administrador.usuario.reset', [$usuario->id]) }}" onclick="return confirm('{{nickname()}} estas seguro que desea enviar un email a {{$usuario->name}} para que restablezca su contraseña?');" style="color:inherit;"><i class="fa fa-key fa-lg fa-rotate-90"></i></a></td>
                                        <td class="text-center"><a href="{{ route('administrador.usuarios', [$usuario->id]) }}" style="color:inherit;"><i class="fa fa-pencil-square-o fa-lg"></i></a></td>
                                        <td class="text-center"><a href="{{ route('administrador.usuario.eliminar', [$usuario->id]) }}" onclick="return confirm('{{nickname()}} estas seguro que desea desactivar a {{$usuario->name}}?');" style="color:inherit;"><i class="fa fa-power-off fa-lg"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div><br><p class="text-center">No Existen Registros</p><br></div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Usuarios Inactivos</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($usuariosInactivos))
                        <table id="usuariosInactivos" class="table table-hover table-striped nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Mail</th>
                                    <th class="text-center" style="width: 80px;">Activar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuariosInactivos as $usuario)
                                    <tr>
                                        <td><img class="img img-circle" src="{{URL::asset($usuario->img)}}" width="50"></td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td class="text-center"><a href="{{ route('administrador.usuario.activar', [$usuario->id]) }}" onclick="return confirm('{{nickname()}} estas seguro que desea activar a {{$usuario->name}}?');" style="color:inherit;"><i class="fa fa-power-off fa-lg"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div><br><p class="text-center">No Existen Registros</p><br></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header no-border">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Agregar Usuario</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            @if ($usuarioEdit == null)
                                {{ Form::open(['route' => 'administrador.usuario.guardar', 'method'=>'POST', 'files'=> true]) }}
                            @else
                                {{ Form::model($usuarioEdit, ['route' =>['administrador.usuario.actualizar', $usuarioEdit->id], 'method'=>'POST', 'files'=> true]) }}
                            @endif
                            {{ Form::label('', "Nombre *", ['style'=>'font-weight: bold;']) }}
                            {{ Form::text('name', null, ['required' => 'required', 'class'=>'form-control']) }}
                            <br>
                            {{ Form::label('', "Email *", ['style'=>'font-weight: bold;']) }}
                            {{ Form::text('email', null, ['required' => 'required', 'class'=>'form-control']) }}
                            <br>
                            @if($usuarioEdit == null)
                                {{ Form::label('', "Rol *", ['style'=>'font-weight: bold;']) }}
                                {{ Form::select('rol', $ddRoles , 2, ['required' => 'required', 'class' => 'form-control', 'id'=>'rol']) }}
                                <br>
                            @endif
                            {{ Form::label('', "Imagen", ['style'=>'font-weight: bold;']) }} Cuadrada
                            <br>
                            {{ Form::file('img', array()) }}
                            <br>
                            @if($usuarioEdit != null && $usuarioEdit->img != "/images/users/default.png")
                                {{ Form::label('imgReset', "Borrar Imagen:", ['style'=>'font-weight: bold;']) }}
                                {{ Form::checkbox('imgReset', '1') }}
                                <br>
                            @endif
                            <br>
                            {{ Form::submit('Guardar', array('class'=> 'btn btn-success btn-lg btn-block'))}}
                            {{ Html::linkRoute('administrador.usuarios', 'Cancelar', null, array('class' => 'btn btn-danger btn-lg btn-block')) }}
                            {{ Form::close() }}
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
    {{--  Img  --}}
    $(document).ready(function () {
        var small={width: "50px",height: "50px"};
        var large={width: "150px",height: "150px"};
        var count=1;
        $(".img").css(small).on('click',function () {
            $(this).animate((count==1)?large:small);
            count = 1-count;
        });
    });
</script>

{{--  Data Tables  --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<script>
$(document).ready(function() {
    $('#usuariosActivos').DataTable( {
        "columnDefs": [
            { "orderable": false, "targets": [6,7,8,9] }
        ],
        "order": [[ 1, 'asc' ]],
        "scrollX": true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ por pagina",
            "zeroRecords": "No existen Registros",
            "info": "", // Mostrando Pagina _PAGE_ de _PAGES_
            "infoEmpty": "",// No existen Registros
            "infoFiltered": "", // (filtrado de _MAX_ registros)
            "search": "Buscar:",
            "paginate": {
                "first":      "Primera",
                "last":       "Ultima",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
        "pageLength": 10,
        //"dom": 'f<<t>p>'
        "dom": '<"top"f>rt<"bottom"p><"clear">'
    } );
} );
$(document).ready(function() {
    $('#usuariosInactivos').DataTable( {
        "columnDefs": [
            { "orderable": false, "targets": [3] }
        ],
        "order": [[ 1, 'asc' ]],
        "scrollX": true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ por pagina",
            "zeroRecords": "No existen Registros",
            "info": "", // Mostrando Pagina _PAGE_ de _PAGES_
            "infoEmpty": "",// No existen Registros
            "infoFiltered": "", // (filtrado de _MAX_ registros)
            "search": "Buscar:",
            "paginate": {
                "first":      "Primera",
                "last":       "Ultima",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
        "pageLength": 10,
        //"dom": '<"top"f>rt<"bottom" p><"clear">'
        "dom": 'f<<t>p>'
    } );
} );
</script>
@endsection

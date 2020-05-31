<?php

// Session
    Route::get('password/reset/{token}/{email}', ['as' => 'password.reset','uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::get('reset/redirect', ['as' => 'reset','uses' => 'Auth\ResetPasswordController@resetRedirect']);
    Auth::routes();
    Route::get('/', 'Auth\LoginController@showlogInForm');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::post('/password/resett', ['as' => 'password.resett', 'uses' => 'Auth\ResetPasswordController@reset']);
    Route::post('/password/emaill', ['as' => 'password.emaill', 'uses' => 'Auth\ResetPasswordController@email']);

// Administrador
    // Usuarios
    Route::get('/administrador/usuarios/{edit?}', ['as' => 'administrador.usuarios', 'uses' => 'AdministradorController@usuarios', 'middleware' => 'roles', 'roles' => ['administrador']]);
    Route::post('/administrador/usuarioGuardar', ['as' => 'administrador.usuario.guardar', 'uses' => 'AdministradorController@usuarioGuardar', 'middleware' => 'roles', 'roles' => ['administrador']]);
    Route::post('/administrador/usuarioActualizar/{id}', ['as' => 'administrador.usuario.actualizar', 'uses' => 'AdministradorController@usuarioActualizar', 'middleware' => 'roles', 'roles' => ['administrador']]);
    Route::get('/administrador/usuarioReset/{id}', ['as' => 'administrador.usuario.reset', 'uses' => 'AdministradorController@usuarioReset', 'middleware' => ['roles'], 'roles' => ['administrador']]);
    Route::get('/administrador/usuarioEliminar/{id}', ['as' => 'administrador.usuario.eliminar', 'uses' => 'AdministradorController@usuarioEliminar', 'middleware' => 'roles', 'roles' => ['administrador']]);
    Route::get('/administrador/ajustes/usuarioActivar/{id}', ['as' => 'administrador.usuario.activar', 'uses' => 'AdministradorController@usuarioActivar', 'middleware' => ['roles'], 'roles' => ['administrador']]);
    Route::get('/administrador/usuarioRol/{user}/{rol}/{es}', ['as' => 'administrador.usuarioRol', 'uses' => 'AdministradorController@usuarioRol', 'middleware' => 'roles', 'roles' => ['administrador']]);
    Route::get('/administrador/usuarioRol/{user}/{rol}/{es}', ['as' => 'administrador.usuarioRol', 'uses' => 'AdministradorController@usuarioRol', 'middleware' => 'roles', 'roles' => ['administrador']]);

// Orgnaizador
    // Home
    Route::get('/organizador/home', ['as' => 'organizador.home', 'uses' => 'OrganizadorController@home', 'middleware' => 'roles', 'roles' => ['organizador']]);

    // Chicos
    Route::get('/organizador/chicos', ['as' => 'organizador.chicos', 'uses' => 'OrganizadorChicosController@chicos', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/chico/eliminar/{id}', ['as' => 'organizador.chico.eliminar', 'uses' => 'OrganizadorChicosController@eliminar', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/chico/activar/{id}', ['as' => 'organizador.chico.activar', 'uses' => 'OrganizadorChicosController@activar', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/chico/ver', ['as' => 'organizador.chico.ver', 'uses' => 'OrganizadorChicosController@ver', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::post('/organizador/chico/guardar', ['as' => 'organizador.chico.guardar', 'uses' => 'OrganizadorChicosController@guardar', 'middleware' => 'roles', 'roles' => ['organizador']]);

    // Cajas
    Route::get('/organizador/cajasPreparacion', ['as' => 'organizador.cajasPreparacion', 'uses' => 'OrganizadorCajasController@preparacion', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/cajasControlar', ['as' => 'organizador.cajasControlar', 'uses' => 'OrganizadorCajasController@controlar', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/caja/validar/{id}', ['as' => 'organizador.caja.validar', 'uses' => 'OrganizadorCajasController@validar', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/cajasRepartir', ['as' => 'organizador.cajasRepartir', 'uses' => 'OrganizadorCajasController@repartir', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/caja/entregar/{id}', ['as' => 'organizador.caja.entregar', 'uses' => 'OrganizadorCajasController@entregar', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::post('/organizador/caja/files/{id}', ['as' => 'organizador.caja.files', 'uses' => 'OrganizadorCajasController@files', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::get('/organizador/cajasRepartidas', ['as' => 'organizador.cajasRepartidas', 'uses' => 'OrganizadorCajasController@repartidas', 'middleware' => 'roles', 'roles' => ['organizador']]);

    // Ayuda

    // Ajustes
    Route::get('/organizador/ajustes/{edit?}', ['as' => 'organizador.ajustes', 'uses' => 'OrganizadorAjustesController@ajustes', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::post('/organizador/ajustes/guardar', ['as' => 'organizador.ajustes.guardar', 'uses' => 'OrganizadorAjustesController@guardar', 'middleware' => 'roles', 'roles' => ['organizador']]);
    Route::post('/organizador/ajustes/actualizar', ['as' => 'organizador.ajustes.actualizar', 'uses' => 'OrganizadorAjustesController@actualizar', 'middleware' => 'roles', 'roles' => ['organizador']]);

@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="m-0 text-dark">{{ @Auth::User()->nombre }}</h1>
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
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count(Auth::User()->chicos) }}</h3>
                        <p>Tus Niñ@s</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="{{ route('organizador.chicos') }}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count(Auth::User()->cajasPreparacion()) }}</h3>
                        <p>Cajas que se Están Preparando</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <a href="{{ route('organizador.cajasPreparacion') }}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count(Auth::User()->cajasControlar()) }}</h3>
                        <p>Cajas Para Controlar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{ route('organizador.cajasControlar') }}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ count(Auth::User()->cajasRepartir()) }}</h3>
                        <p>Cajas Para Repartir</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="{{ route('organizador.cajasRepartir') }}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
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

    @endsection

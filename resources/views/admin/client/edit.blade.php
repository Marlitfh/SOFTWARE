@extends('layouts.admin')
@section('title','Edición de clientes')
@section('content')
@if ($errors->any())
<div class="alert alert-danger p-2">
    <h6 class="m-0">Alerts:</h6>
    <ul class="m-0">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Cliente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar cliente</h4>
                    </div>
                    {!! Form::model($client, ['route'=>['clients.update', $client],'method'=>'PUT']) !!}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="clie_dni">DNI</label>
                            <input type="number" name="clie_dni" id="clie_dni" class="form-control" value="{{$client->clie_dni}}"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="clie_name">Nombre</label>
                            <input type="text" name="clie_name" id="clie_name" class="form-control" value="{{$client->clie_name}}"
                                required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="clie_ruc">RUC</label>
                            <input type="number" name="clie_ruc" id="clie_ruc" class="form-control" placeholder="opcional"
                                value="{{$client->clie_ruc}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="clie_email">Email</label>
                            <input type="email" name="clie_email" id="clie_email" class="form-control" placeholder="opcional"
                                value="{{$client->clie_email}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clie_phone">Celular</label>
                            <input type="number" name="clie_phone" id="clie_phone" class="form-control" placeholder="opcional"
                                value="{{$client->clie_phone}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clie_address">Dirección</label>
                            <input type="text" name="clie_address" id="clie_address" class="form-control" placeholder="opcional"
                                value="{{$client->clie_address}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
                    <a href="{{route('clients.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

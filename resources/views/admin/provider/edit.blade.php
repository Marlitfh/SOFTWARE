@extends('layouts.admin')
@section('title','Edición de proveedor')
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
            Editar proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar proveedor</h4>
                    </div>
                    {!! Form::model($provider, ['route'=>['providers.update', $provider],'method'=>'PUT']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="prov_ruc">RUC</label>
                            <input type="number" name="prov_ruc" id="prov_ruc" class="form-control" required
                                value="{{$provider->prov_ruc}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prov_name">Nombre</label>
                            <input type="text" name="prov_name" id="prov_name" class="form-control" required
                                value="{{$provider->prov_name}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="prov_email">Email</label>
                            <input type="email" name="prov_email" id="prov_email" class="form-control"
                                placeholder="ejemplo@gmail.com" required value="{{$provider->prov_email}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prov_phone">Celular</label>
                            <input type="number" name="prov_phone" id="prov_phone" class="form-control" required
                                value="{{$provider->prov_phone}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prov_address">Dirección</label>
                            <input type="text" name="prov_address" id="prov_address" class="form-control" required
                                value="{{$provider->prov_address}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
                    <a href="{{route('providers.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
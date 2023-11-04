@extends('layouts.admin')
@section('title','Información de proveedor')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$provider->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedor</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$provider->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-2">
                                <h3>{{$provider->name}}</h3>
                            </div>
                            <div class="border-bottom py-2">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">Sobre Proveedor</button>
                                    <a class="list-group-item list-group-item-action" href="{{route('products.index')}}" class="dropdown-item">Productos</a>
                                    <a class="list-group-item list-group-item-action" href="{{route('products.create')}}" class="dropdown-item">Registrar producto</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del proveedor</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item p-0">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fa fa-info-circle mr-1"></i>Nombre</strong>
                                        <p class="text-muted">{{$provider->prov_name}}</p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i>Número de RUC</strong>
                                        <p class="text-muted">{{$provider->prov_ruc}}</p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-mobile mr-1"></i>Celular</strong>
                                        <p class="text-muted">{{$provider->prov_phone}}</p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
                                        <p class="text-muted">{{$provider->prov_email}}</p>
                                        <hr>
                                        <strong><i class="fas fa-map-marked-alt mr-1"></i>Dirección</strong>
                                        <p class="text-muted">{{$provider->prov_address}}</p>
                                        {{-- <hr> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('providers.index')}}" class="btn btn-dark float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
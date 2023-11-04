@extends('layouts.admin')
@section('title','Gestión de empresa')
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
            Gestión de empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Gestión de empresa</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong><i class="fas fa-file-signature mr-1"></i>Nombre</strong>
                            <p class="text-muted">{{$company->comp_name}}</p>
                            <hr>
                            <strong><i class="fas fa-align-left mr-1"></i>Descripción</strong>
                            <p class="text-muted">{{$company->comp_description}}</p>
                            <hr>
                            <strong><i class="fas fa-map-marked-alt mr-1"></i>Dirección</strong>
                            <p class="text-muted">{{$company->comp_address}}</p>
                            <hr>
                        </div>

                        <div class="form-group col-md-6">
                            <strong><i class="far fa-address-card mr-1"></i>RUC</strong>
                            <p class="text-muted">{{$company->comp_ruc}}</p>
                            <hr>
                            <strong><i class="fas fa-envelope mr-1"></i>Correo</strong>
                            <p class="text-muted">{{$company->comp_email}}</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-images mr-1"></i>Logo</strong><br>
                                </div>
                                <div class="col-md-6">
                                    @if ($company->comp_logo=="logo_cam.png")
                                        <img src="{{asset('melody/images/logo_cam.png')}}" alt="logo" style="width:100px; height:50px;">
                                    @else
                                    <img style="width:50px; height:50px;" src="{{asset('image/'.$company->comp_logo)}}"
                                    class="rounded float-left" alt="logo">
                                    @endif
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                        data-target="#exampleModal-2">
                        Actualizar
                    </button>
                    @include('admin.company._modal_edit')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
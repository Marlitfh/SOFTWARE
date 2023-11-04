@extends('layouts.admin')

@section('title','Información del usuario')

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$user->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
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
                                <h3>{{$user->name}}</h3>
                            </div>

                            {{-- <div class="border-bottom py-2">
                                <div class="list-group">
                                    <p>Las categorías abarcan a un conjunto de productos, 
                                    en este caso un conjunto de productos <strong>{{$user->name}}</strong></p>
                                </div>
                            </div> --}}

                        </div>

                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de usuario</h4>
                                </div>
                            </div>

                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-file-signature mr-1"></i>Nombre</strong>
                                        <p class="text-muted">{{$user->name}}</p>
                                        {{-- <hr> --}}
                                    </div>

                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
                                        <p class="text-muted">{{$user->email}}</p>
                                        {{-- <hr> --}}
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-footer text-muted">
                    <a href="{{route('users.index')}}" class="btn btn-dark float-right">Regresar</a>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
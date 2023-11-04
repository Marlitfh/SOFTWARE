@extends('layouts.admin')
@section('title','Registro de usuario de sistema')
{{-- @section('styles')
@endsection --}}
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registrar usuario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar usuario</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar usuario</h4>
                    </div>

                    {!! Form::open(['route'=>'users.store','method'=>'POST']) !!}

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="email" class="form-control" required placeholder="example@gmail.com">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    @include('admin.user._form')

                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('users.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection --}}
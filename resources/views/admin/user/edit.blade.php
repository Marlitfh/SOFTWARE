@extends('layouts.admin')

@section('title','Edición de usuario')
{{-- @section('styles')
@endsection --}}
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar usuario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar usuario</h4>
                    </div>
                    {{-- método PUT para actualizar o insertar un recurso con ID --}}
                    {!! Form::model($user, ['route'=>['users.update', $user],'method'=>'PUT']) !!}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}"
                                required>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="nueva clave - si desea">
                    </div> --}}

                    @include('admin.user._form')

                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
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
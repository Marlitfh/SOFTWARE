@extends('layouts.admin')

@section('title','Edición de rol')
{{-- @section('styles')
@endsection --}}
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar rol
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar rol</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar rol</h4>
                    </div>
                    {{-- método PUT para actualizar o insertar un recurso con ID --}}
                    {!! Form::model($role, ['route'=>['roles.update', $role],'method'=>'PUT']) !!}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}"
                                required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{$role->slug}}"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" rows="3"
                            class="form-control">{{$role->description}}</textarea>
                    </div>

                    @include('admin.role._form')

                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
                    <a href="{{route('roles.index')}}" class="btn btn-dark">Cancelar</a>

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
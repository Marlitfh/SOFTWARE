@extends('layouts.admin')
@section('title','Registrar rol de sistema')
{{-- @section('styles')
@endsection --}}
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de rol
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de rol</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de rol</h4>
                    </div>

                    {!! Form::open(['route'=>'roles.store','method'=>'POST']) !!}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" required placeholder="example_admin">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required placeholder="example_admin">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>

                    @include('admin.role._form')

                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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
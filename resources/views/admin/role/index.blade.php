@extends('layouts.admin')
@section('title','Gestión de roles de sistema')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Roles de sistema
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles de sistema</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Roles de sistema</h4>
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('roles.create')}}" class="dropdown-item">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td><a href="">{{$role->name}}</a></td>
                                    <td>{{$role->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['roles.destroy',$role],'method'=>'DELETE'])
                                        !!}
                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{route('roles.edit', $role)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection --}}
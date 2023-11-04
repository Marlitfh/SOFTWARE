@extends('layouts.admin')
@section('title','Edición de categoría')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <h6>Alerts:</h6>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar categoría</h4>
                    </div>
                    {!! Form::model($category, ['route'=>['categories.update', $category],'method'=>'PUT']) !!}
                    <div class="form-group">
                        <label for="cate_name">Nombre</label>
                    <input type="text" name="cate_name" id="cate_name" class="form-control" value="{{$category->cate_name}}" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="cate_description">Descripción</label>
                    <textarea class="form-control" name="cate_description" id="cate_description" rows="3">{{$category->cate_description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')
@section('title','Gestión de productos')
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
        <h3 class="page-title">Productos</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('products.create')}}" class="dropdown-item">Agregar</a>
                                <a href="{{route('productstatedetails.index')}}" class="dropdown-item">Estado</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Vence</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td><a href="{{route('products.show', $product)}}">{{$product->prod_name}}</a></td>
                                    <td>{{$product->prod_stock}}</td>
                                    {{-- <td>{{$product->prod_expiration}}</td> --}}
                                    @if (!is_null($product->prod_expiration))
                                    <td>{{date("d/m/y", strtotime($product->prod_expiration))}}</td>
                                    @else
                                    <td></td>
                                    @endif

                                     @if (!is_null($product->prod_expiration) && (strtotime($product->prod_expiration)-strtotime($fecha_actual))/86400 > 0 && (strtotime($product->prod_expiration)-strtotime($fecha_actual))/86400 < 11 && $product->prod_stock>0)
                                     <td>
                                        <a class="jsgrid-button btn btn-primary" href="#" title="Editar">
                                            vence en:
                                            {{(strtotime($product->prod_expiration)-strtotime($fecha_actual))/86400}}
                                            <i class="fas fa-check"></i>
                                        </a>
                                     </td>
                                    @else
                                        <td>
                                            <a class="jsgrid-button btn btn-success" href="#" title="Editar">Activo
                                                <i class="fas fa-check"></i>
                                            </a>
                                        </td>
                                    @endif

                                    <td>{{$product->category->cate_name}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['products.destroy',$product],'method'=>'DELETE'])
                                        !!}
                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{route('products.edit', $product)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
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
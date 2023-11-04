@extends('layouts.admin')
@section('title','Información de producto')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$product->prod_name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Producto</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->prod_name}}</li>
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
                                <a href="{{asset('image/'.$product->prod_image)}}" target="_blank"><img
                                        src="{{asset('image/'.$product->prod_image)}}" alt="imagen-de-producto"
                                        class="img-lg rounded-circle mb-3"></a>
                                <h3>{{$product->prod_name}}</h3>
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">Estado</span>
                                    <span class="float-right text-muted">
                                        @if ($product->prod_status=="ACTIVE")
                                        ACTIVO
                                        @endif
                                        @if ($product->prod_status=="EXPIRED")
                                        EXPIRADO
                                        @endif
                                        @if ($product->prod_status=="OBSOLETE")
                                        OBSOLETO
                                        @endif
                                        @if ($product->prod_status=="IMPERFECT")
                                        DEFECTUOSO
                                        @endif
                                        @if ($product->prod_status=="DEACTIVATED")
                                        DESACTIVADO
                                        @endif
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Categoria</span>
                                    <span class="float-right text-muted">
                                        <a
                                            href="{{route('categories.show',$product->category->id)}}">{{$product->category->cate_name}}</a>
                                    </span>
                                </p>
                            </div>

                            {{-- @if ($product->prod_status == 'ACTIVE')
                            <a class="btn btn-success btn-block" href="{{route('change.status.products',$product)}}"
                                title="Editar">ACTIVO</a>
                            @else
                            <a class="btn btn-danger btn-block" href="{{route('change.status.products',$product)}}"
                                title="Editar">DESACTIVADO</a>
                            @endif --}}

                            @if ($product->prod_status=="ACTIVE")
                            @if ((strtotime($product->prod_expiration)-strtotime($fecha_actual))/86400 > 10)
                            <td>
                                <a class="btn-block btn btn-success" href="#" title="Editar">Activo
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>
                            @else
                            <td>
                                <a class="btn-block btn btn-primary" href="#" title="Editar">
                                    vence:
                                    {{(strtotime($product->prod_expiration)-strtotime($fecha_actual))/86400}}
                                    días
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>
                            @endif
                            @endif

                            @if ($product->prod_status=="EXPIRED")
                            <td>
                                <a class="btn-block btn btn-danger" href="#" title="Editar">Expirado
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                            @endif

                            @if ($product->prod_status=="OBSOLETE")
                            <td>
                                <a class="btn-block btn btn-dark" href="#" title="Editar">Obsoleto
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                            @endif

                            @if ($product->prod_status=="IMPERFECT")
                            <td>
                                <a class="btn-block btn btn-dark" href="#" title="Editar">Defectuoso
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                            @endif

                            @if ($product->prod_status=="DEACTIVATED")
                            <td>
                                <a class="btn-block btn btn-warning" href="#" title="Editar">Desactivado
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                            @endif


                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i>Código</strong>
                                        <p class="text-muted">{{$product->id}}</p>
                                        <hr>
                                        <strong><i class="fas fa-window-restore mr-1"></i>Stock</strong>
                                        <p class="text-muted">{{$product->prod_stock}}</p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-money-check-alt mr-1"></i>Precio venta</strong>
                                        <p class="text-muted">{{$product->prod_price}}</p>
                                        <hr>
                                        <strong><i class="fas fa-barcode mr-1"></i>Código de barra</strong>
                                        <p class="text-muted">
                                            {!! DNS1D::getBarcodeHTML($product->prod_code, 'EAN13'); !!}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('products.index')}}" class="btn btn-dark float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
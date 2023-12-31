@extends('layouts.admin')
@section('title','Gestión de ventas')
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('sales.create')}}">
        <span class="btn btn-primary" style="border:none;">+ Crear venta</span>
    </a>
</li>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ventas</h4>
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('sales.create')}}" class="dropdown-item">Registrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row"><a href="{{route('sales.show',$sale)}}">{{$sale->id}}</a></th>
                                    <td>{{date("d/m/y", strtotime($sale->sale_date))}}</td>
                                    <td>{{$sale->sale_total}}</td>
                                    @if ($sale->sale_status=="VALID")
                                    <td>
                                        <a class="jsgrid-button btn btn-success"
                                            href="{{route('change.status.sales',$sale)}}" title="Editar">Activo
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger"
                                            href="{{route('change.status.sales',$sale)}}" title="Editar">Cancelado
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td>
                                        <a href="{{route('sales.pdf',$sale)}}"
                                            class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        {{-- <a href="{{route('sales.print',$sale)}}"
                                            class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a> --}}
                                        <a href="{{route('sales.show',$sale)}}"
                                            class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
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
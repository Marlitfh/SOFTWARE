@extends('layouts.admin')
@section('title','Gestión de compras')
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('purchases.create')}}">
        <span class="btn btn-primary bg-success" style="border:none;">+ Crear compra</span>
    </a>
</li>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Compras</h4>
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('purchases.create')}}" class="dropdown-item">Registrar</a>
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
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row"><a
                                            href="{{route('purchases.show',$purchase)}}">{{$purchase->id}}</a></th>
                                    <td>{{date("d/m/y", strtotime($purchase->purc_date))}}</td>
                                    <td>{{$purchase->purc_total}}</td>
                                    @if ($purchase->purc_status=="VALID")
                                    <td>
                                        <a class="jsgrid-button btn btn-success"
                                            href="{{route('change.status.purchases',$purchase)}}" title="Editar">Activo
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger"
                                            href="{{route('change.status.purchases',$purchase)}}"
                                            title="Editar">Cancelado
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td>
                                        <a href="{{route('purchases.pdf',$purchase)}}"
                                            class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('purchases.show',$purchase)}}"
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
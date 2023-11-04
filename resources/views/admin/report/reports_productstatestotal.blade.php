@extends('layouts.admin')
@section('title','Reportes de estado de productos')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Reporte de estados de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Total</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('reports.productexpired')}}">Vencidos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('reports.productimperfect')}}">Dañados</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('reports.productobsolete')}}">Obsoletos</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Estados de productos - Mes actual</h4>
                        <span>
                            Total afectados:
                            @foreach ($totales as $total)
                            {{$total->total}}
                            @endforeach
                        </span>
                    </div>
                    <div class="table-responsive" style="display: flex; justify-content: center;">
                        <div class="col-md-8">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Vencido/dañado/obsoleto</th>
                                        {{-- <th>Total</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productstates as $productstate)
                                    <tr>
                                        <td>{{$productstate->product}}</td>
                                        <td>{{$productstate->cantidad}}</td>
                                        {{-- <td>{{$productstate->subtotal}}</td> --}}
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
</div>
@endsection
@extends('layouts.admin')
@section('title','Sistema STJ')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h4 class="page-title">
            Panel Administrador
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                        <i class="fas fa-cart-arrow-down fa-4x"></i>
                                    </div>
                                    <div class="text-value h4">
                                    <strong>
                                        @foreach ($totalcompra as $total)
                                         PEN {{$total->totalcompra}} (MES ACTUAL)
                                        @endforeach
                                    </strong>
                                    </div>
                                    <div class="h4">Compras</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                    <a href="{{route('purchases.index')}}" class="small-box-footer h4">
                                        Compras <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                        <i class="fas fa-shopping-cart fa-4x"></i>
                                    </div>
                                    <div class="text-value h4">
                                        <strong>
                                           @foreach ($totalventa as $total)
                                            PEN {{$total->totalventa}} (MES ACTUAL)
                                           @endforeach
                                        </strong>
                                    </div>
                                    <div class="h4">Ventas</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                    <a href="{{route('sales.index')}}" class="small-box-footer h4">
                                        Ventas <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center page-title">Compras - meses</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="compras"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center page-title">Ventas - meses</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="ventas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center page-title">Ventas diarias - Mes actual</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="ventas_diarias" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-heading">
                            <h4 class="card-title">Productos más vendidos - Mes actual</h4>
                        </div>
                    </div>
                    <div class="card-body scrollbar scroll-dark pt-0" style="max-height:350px;">
                        <div class="datatable-wrapper table-responsive">
                            <table id="order-listing" class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Nombre</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Cantidad vendida</th>
                                        <th>Ver detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productosvendidos as $pv)
                                    <tr>
                                        <td>{{$pv->id}}</td>
                                        <td>{{$pv->name}}</td>
                                        <td>{{$pv->code}}</td>
                                        <td><strong>{{$pv->stock}} </strong>Unidades</td>
                                        <td><strong>{{$pv->quantity}} </strong>Unidades</td>
                                        <td>
                                            <a href="{{route('products.show',$pv->id)}}" class="btn btn-primary">
                                                <i class="far fa-eye"></i> Ver detalles
                                            </a>
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
</div>
@endsection
@section('scripts')
<script>
    $(function () {
    var varCompra= document.getElementById('compras').getContext('2d');
    var charCompra = new Chart(varCompra, {
        type: 'bar',
        data: {
            labels: [<?php foreach($comprasmes as $reg)
                {
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_traducido= strftime('%B', strtotime($reg->mes));

                echo '"'.$mes_traducido.'",';} ?>],
                datasets: [{
                    label: 'Compras',
                    data: [<?php foreach ($comprasmes as $reg){echo ''.$reg->totalmes.',';} ?>],
                    backgroundColor:'rgba(60, 179, 113, 1)',
                    borderColor: 'rgba(61, 180, 111, 0.2)',
                    borderWith: 3
                }]
            },
            options:{ scales:{ yAxes:[{ ticks:{beginAtZero:true} }] } }
        });

        var varVenta= document.getElementById('ventas').getContext('2d');
        var charVenta = new Chart(varVenta, {
        type: 'bar',
        data: {
            labels: [<?php foreach($ventasmes as $reg)
                {
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_traducido= strftime('%B', strtotime($reg->mes));

                echo '"'.$mes_traducido.'",';} ?>],
                datasets: [{
                    label: 'Ventas',
                    data: [<?php foreach ($ventasmes as $reg){echo ''.$reg->totalmes.',';} ?>],
                    backgroundColor:'rgba(0, 0, 255, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 0.2)',
                    borderWith: 1
                }]
            },
            options:{ scales:{ yAxes:[{ ticks:{beginAtZero:true} }] } }
        });

        var varVenta= document.getElementById('ventas_diarias').getContext('2d');
        var charVenta = new Chart(varVenta, {
        type: 'bar',
        data: {
            labels: [<?php foreach($ventasdia as $vd)
                {
                    $dia= $vd->dia;
                echo '"'.$dia.'",';} ?>],
                datasets: [{
                    label: 'Ventas',
                    data: [<?php foreach ($ventasdia as $reg){echo ''.$reg->totaldia.',';} ?>],
                    backgroundColor:'rgba(0, 0, 255, 0.8)',
                    borderColor: 'rgba(0, 0, 255, 0.2)',
                    borderWith: 1
                }]
            },
            options:{ scales:{ yAxes:[{ ticks:{beginAtZero:true} }] } }
        });
    });
</script>

@endsection
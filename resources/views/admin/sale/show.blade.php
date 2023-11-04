@extends('layouts.admin')
@section('title','Detalles de venta')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalle de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de ventaa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="nombre">Cliente</label>
                            <p><a href="{{route('clients.show', $sale->client)}}">{{$sale->client->clie_name}}</a></p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="vendedor">Vendedor</label>
                            <p>{{$sale->user->name}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="número_venta">Número de venta</label>
                            <p>{{$sale->id}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="número_venta">Fecha de venta</label>
                            <p>{{date("d/m/y H:i:s", strtotime($sale->sale_date))}}</p>
                        </div>
                        <br><br>
                    </div>

                    <div class="form-group row">
                        <h4 class="card-title ml-3">Detalle de venta</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalle_venta_show" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio venta(PEN)</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal(PEN)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saleDetails as $saleDetail)
                                    <tr>
                                        <td>{{$saleDetail->product->prod_name}}</td>
                                        <td>{{$saleDetail->sade_price}}</td>
                                        <td>{{$saleDetail->sade_discount}} %</td>
                                        <td>{{$saleDetail->sade_quantity}}</td>
                                        <td>S/ {{number_format($saleDetail->sade_quantity*$saleDetail->sade_price - (($saleDetail->sade_quantity*$saleDetail->sade_price) * $saleDetail->sade_discount / 100),2)}}
                                        </td>
                                        {{-- $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount/100 --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p style="text-align:right;">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p style="text-align:right;">
                                                S/ {{number_format($subtotal,2)}}
                                            </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p style="text-align:right;">TOTAL IMPUESTO ({{$sale->sale_tax}} %):</p>
                                        </th>
                                        <th>
                                            <p style="text-align:right;">S/ {{number_format($subtotal*$sale->sale_tax/100,2)}}
                                            </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p style="text-align:right;">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p style="text-align:right;">S/ {{number_format($sale->sale_total,2)}}</p>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('sales.index')}}" class="btn btn-dark float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('title','Detalles de compras')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalle de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$purchase->id}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="form-group row">
                        <div class="col-md-6 text-center">
                            <label class="form-control-label" for="nombre">Proveedor</label>
                            <p class="m-0"><a
                                    href="{{route('providers.show', $purchase->provider)}}">{{$purchase->provider->prov_name}}</a>
                            </p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="num_compra">Número de Compra</label>
                            <p class="m-0">{{$purchase->id}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="fec_compra">Fecha de Compra</label>
                            <p class="m-0">{{date("d/m/y H:i:s", strtotime($purchase->purc_date))}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <h4 class="card-title ml-3">Detalle de compra</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio (PEN)</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal (PEN)</th>
                                    </tr>

                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">
                                            <p style="text-align:right;">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p style="text-align:right;">
                                                S/{{number_format($subtotal,2)}}
                                            </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p style="text-align:right;">TOTAL IMPUESTO ({{$purchase->purc_tax}} %):</p>
                                        </th>
                                        <th>
                                            <p style="text-align:right;">
                                                S/{{number_format($subtotal*$purchase->purc_tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p style="text-align:right;">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p style="text-align:right;">S/{{number_format($purchase->purc_total,2)}}
                                            </p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($purchaseDetails as $purchaseDetail)
                                    <tr>
                                        <td>{{$purchaseDetail->product->prod_name}}</td>
                                        <td>S/{{number_format($purchaseDetail->pude_price,2)}}</td>
                                        <td>{{$purchaseDetail->pude_quantity}}</td>
                                        <td>S/{{number_format($purchaseDetail->pude_quantity*$purchaseDetail->pude_price,2)}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('purchases.index')}}" class="btn btn-dark float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
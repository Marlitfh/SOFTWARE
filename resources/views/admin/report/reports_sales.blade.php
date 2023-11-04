@extends('layouts.admin')
@section('title','Reportes de ventas por fechas')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Reporte de ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte de ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Reporte de ventas</h4>
                    </div>
                    {!! Form::open(['route'=>'reports.salesresults','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-12 col-md-2 text-center">
                            <span>Fecha de inicio</span>
                            <div class="form-group">
                            <input type="date" name="fecha_ini" id="fecha_ini" class="form-control" value="{{old('fecha_ini')}}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{old('fecha_fin')}}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <div class="form-group">
                             <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center">
                            <span>Ventas</span>
                            <div class="form-group">
                                <strong>{{$sales->count()}}</strong>
                            </div>
                        </div>
                        <div class="col-md-1 text-center">
                            <span>Anuladas</span>
                            <div class="form-group">
                                <strong>{{$sales->count()-$sales_actives->count()}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span class="bg-light">Ingresos</span>
                            <div class="form-group">
                            <strong>S/{{$total}}</strong>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                                    <td>{{date("d/m/y H:i", strtotime($sale->sale_date))}}</td>
                                    <td>{{$sale->sale_total}}</td>
                                    <td>
                                        {{-- {{$sale->sale_status}} --}}
                                        @if ($sale->sale_status=="VALID")
                                            VALIDA
                                        @else
                                            ANULADA
                                        @endif
                                    </td>
                                    <td style="width: 50px;">
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
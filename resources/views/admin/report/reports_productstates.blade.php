@extends('layouts.admin')
@section('title','Reportes de estado de producto')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Reporte de productos {{$state}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('reports.productstates')}}">Total</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$state}}</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route($state1url)}}">{{$state1}}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route($state2url)}}">{{$state2}}</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Inventario de productos {{$state}}</h4>
                    </div>

                    {!! Form::open(['route'=>'reports.productstatesresults','method'=>'POST']) !!}
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
                        <div class="col-12 col-md-2" style="padding: 20px 0 0 0;">
                            <div class="form-group">
                             <button type="submit" class="btn btn-primary btn-sm" style="width: 100%;">Consultar</button>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span class="bg-light">Total {{$state}}</span>
                            <div class="form-group">
                            <strong>{{$total}}</strong>
                            </div>
                        </div>
                        <input type="hidden" name="state" value="{{$state}}">
                    </div>
                    {!! Form::close() !!}

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>Producto</th>
                                    <th>Estado</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productstates as $productstate)
                                <tr>
                                    <td>{{$productstate->id}}</td>
                                    <td>{{date("d/m/y", strtotime($productstate->prod_stat_deta_date))}}</td>
                                    <td>{{$productstate->product->prod_name}}</td>
                                    @if ($productstate->product_state_id==1)
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="#" title="Editar">Vencido
                                        <i class="fas fa-times"></i>
                                       </a>
                                    </td>
                                    @endif
                                    @if ($productstate->product_state_id==2)
                                    <td>
                                        <a class="jsgrid-button btn btn-light" href="#" title="Editar">Dañado
                                        <i class="fas fa-times"></i>
                                       </a>
                                    </td>
                                    @endif
                                    @if ($productstate->product_state_id==3)
                                    <td>
                                        <a class="jsgrid-button btn btn-dark" href="#" title="Editar">Obsoleto
                                        <i class="fas fa-times"></i>
                                       </a>
                                    </td>
                                    @endif
                                    <td>{{$productstate->prod_stat_deta_cantidad}}</td>
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
@extends('layouts.admin')
@section('title','Reportes de ventas por fechas')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Estado de producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estados</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Estado de producto</h4>
                        <button type="button" class="btn btn-ligth btn-sm float-right" data-toggle="modal"
                        data-target="#exampleModal-2">
                        + Agregar
                        </button>
                        @include('admin.product._modal_state')

                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>Producto</th>
                                    <th>Estado</th>
                                    <th>Cantidad</th>
                                    <th><i class='fas fa-exchange-alt'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productstates as $productstate)
                                <tr>
                                    <td>{{$productstate->id}}</td>
                                    <td>{{date("d/m/y", strtotime($productstate->prod_stat_deta_date))}}</td>
                                    <td>{{$productstate->product->prod_name}}</td>
                                    {{-- <td>{{date("d/m/y", strtotime($productstate->product->prod_expiration))}}</td> --}}
                                    <td>
                                        @if ($productstate->product_state_id == 1)
                                           <a class="jsgrid-button btn btn-danger" href="#" title="Editar">Vencido
                                            <i class="fas fa-times"></i>
                                           </a>
                                        @endif
                                        @if ($productstate->product_state_id == 2)
                                           <a class="jsgrid-button btn btn-light" href="#" title="Editar">Dañado
                                            <i class="fas fa-times"></i>
                                           </a>
                                        @endif
                                        @if ($productstate->product_state_id == 3)
                                           <a class="jsgrid-button btn btn-dark" href="#" title="Editar">Obsoleto
                                            <i class="fas fa-times"></i>
                                           </a>
                                        @endif
                                    </td>
                                    <td>{{$productstate->prod_stat_deta_cantidad}}</td>
                                    <td style="width: 50px;">
                                        {{-- {!! Form::open(['route'=>['productstates.destroy',$productstates],'method'=>'DELETE'])
                                        !!} --}}
                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="#" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {{-- <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}
                                        {{-- {!! Form::close() !!} --}}
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
{{-- @endsection
@section('scripts')
<script>
    var product_id= $('#product_id');
    product_id.change(function(){
        // alert(product_id.val());
    $.ajax({
        url: "{{route('get_products_by_id')}}",
        method: "GET",
        data: {
            product_id: product_id.val(),
        },
        success:function(data) {
            // alert(data.prod_expiration);
            $("#prod_stat_deta_prod_expiration").val(data.prod_expiration);
        }
    });
});
</script>
@endsection --}}
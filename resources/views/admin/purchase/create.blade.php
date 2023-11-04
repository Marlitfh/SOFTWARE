@extends('layouts.admin')
@section('title','Registro de compras')
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('providers.create')}}">
        <span class="btn btn-light mr-1" style="border:none;">+ Proveedor</span>
    </a>
    <a class="nav-link" href="{{route('products.create')}}">
        <span class="btn btn-secondary" style="border:none;">+ Producto</span>
    </a>
</li>
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger p-2">
    <h6 class="m-0">Alerts:</h6>
    <ul class="m-0">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registrar compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar compra</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'purchases.store','method'=>'POST']) !!}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar compra</h4>
                    </div>
                    @include('admin.purchase._form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="registrar_compra" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{route('purchases.index')}}" class="btn btn-dark">Cancelar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- {!! Html::script('melody/js/_purchase_create.js') !!} --}}

<script>
    $('#product_id').change(prod_change);
    function prod_change(){
        $('#pude_quantity').focus();
    }
// ############################################################################
    $(document).ready(function () {
    $("#agregar_producto").click(function () {
        agregar();
    });
});

// ############################################################################
var cont=0;
total=0;
subtotal=[];

// ############################################################################
$("#registrar_compra").hide();

// ############################################################################
function agregar() {
    product_id = $("#product_id").val();
    producto= $("#product_id option:selected").text();
    quantity= $("#pude_quantity").val();
    price= $("#pude_price").val();
    impuesto= $("#purc_tax").val();

    if (product_id !="" && quantity !="" && quantity > 0 && price !="" && price > 0 && impuesto !="") {
        var prod_buscar=0;
        var prod_id_array= document.getElementsByName('product_id[]');
        for (var i = 0; i < prod_id_array.length; i++){
            if (product_id==prod_id_array[i].value) {
                 prod_buscar=1;
            }
        }

        if(prod_buscar==0){
        subtotal[cont]= quantity*price;
        total= total + subtotal[cont];
        var fila= '<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td><input type="hidden" id="pude_price[]" name="pude_price[]" value="'+price+'"><input type="number" id="pude_price[]" name="pude_price[]" value="'+price+'" class="form-control" disabled></td> <td><input type="hidden" name="pude_quantity[]" value="'+quantity+'" class="form-control"><input type="number" name="pude_quantity[]" value="'+quantity+'" class="form-control" disabled></td> <td style="text-align:right;">S/ '+subtotal[cont]+'</td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#compra_detalle').append(fila);
        }else{
            alert("El producto ya se encuentra agregado!")
            limpiar();
        }
    } else {
        // Swal.fire({
        //     type: 'error',
        //     text: 'Rellene todos los campos de las compras',
        // })
        alert("Rellene campos y verifique (precio y cantidad) > cero, para agregar compra");
    }
}

// ############################################################################
function limpiar() {
    document.getElementById('product_id').value="";
    $('#product_id').selectpicker('refresh');
    $('#pude_quantity').val("");
    $('#pude_price').val("");
}

// ############################################################################
function totales() {
     $('#total').html("PEN " + total.toFixed(2));
     total_impuesto= total * impuesto / 100;
     total_pagar = total + total_impuesto;
     $('#total_impuesto').html("PEN " + total_impuesto.toFixed(2));
     $('#total_pagar_span').html("PEN " + total_pagar.toFixed(2));
     $('#total_pagar').val(total_pagar.toFixed(2));
}

// ############################################################################
function evaluar() {
    if (total>0) {
        $('#registrar_compra').show();
    } else {
        $('#registrar_compra').hide();
    }
}

// ############################################################################
function eliminar(index) {
    total= total - subtotal[index];
    total_impuesto= total * impuesto / 100;
    total_pagar= total + total_impuesto;

    $('#total').html("PEN " + total.toFixed(2));
    $('#total_impuesto').html("PEN " + total_impuesto.toFixed(2));
    $('#total_pagar_span').html("PEN " + total_pagar.toFixed(2));
    $('#total_pagar').val(total_pagar.toFixed(2));

    $("#fila"+index).remove();
    evaluar();
}
// ############################################################################
</script>
@endsection
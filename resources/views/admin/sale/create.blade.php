@extends('layouts.admin')
@section('title','Registro de ventas')
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('clients.create')}}">
        <span class="btn btn-secondary" style="border:none;">+ Crear cliente</span>
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
            Registrar venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar venta</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'sales.store','method'=>'POST']) !!}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar venta</h4>
                    </div>
                    @include('admin.sale._form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="registrar_venta" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{route('sales.index')}}" class="btn btn-dark">Cancelar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- {!! Html::script('melody/js/_sale_create.js') !!} --}}

<script>

    // #########################################################################################
var client_id= $('#client_id');
client_id.change(function(){
    $.ajax({
        url: "{{route('get_clients_by_id')}}",
        method: "GET",
        data: {
            client_id: client_id.val(),
        },
        success:function(data) {
            $("#clie_dni").val(data.clie_dni);
        }
    });
});

    function buscar_cliente(dni){
    $.ajax({
        url: "{{route('get_clients_by_dni')}}",
        type: "GET",
        data: {dni: dni},
        dataType:"json",
        success:function(data) {
            if(Object.keys(data).length>0){
                document.getElementById('client_id').value=data.id;
                $('#client_id').selectpicker('refresh');
            }else{
               alert('No se encontró cliente');
               document.getElementById('client_id').value="";
               $('#client_id').selectpicker('refresh');
            }
            // $('#client_id option[value="'+data.id+'"]').attr("selected", true);
        }
    });
}

$(document).on('keyup', '#clie_dni', function() {
    var dni_input = $(this).val();
    if (dni_input !="") {
       if (dni_input.length == 8) {
           alert("DNI: "+dni_input);
          buscar_cliente(dni_input);
        }
    } else {
        document.getElementById('client_id').value=dni_input;
        $('#client_id').selectpicker('refresh');
    }
});

// #########################################################################################
$("#product_id").change(mostrarValores);
function mostrarValores() {
    datosProducto = document.getElementById("product_id").value.split('_');
    $('#prod_stock').val(datosProducto[1]);
    $('#prod_price').val(datosProducto[2]);
    $('#prod_code').val(datosProducto[3]);
    $('#sade_quantity').focus();
}

function obtener_registro(code){
    $.ajax({
        url: "{{route('get_products_by_barcode')}}",
        type: "GET",
        data: {code: code},
        success:function(data) {
            if(Object.keys(data).length>0){
            // $('#product_id option[value="'+data.id+'_'+data.prod_stock+'_'+data.prod_price+'"]').attr("selected", true);
            document.getElementById('product_id').value=data.id+'_'+data.prod_stock+'_'+data.prod_price+'_'+data.prod_code;
            $('#product_id').selectpicker('refresh');
            $("#prod_price").val(data.prod_price);
            $("#prod_stock").val(data.prod_stock);
            $('#sade_quantity').focus();
            }else {
                alert('No se encontró Producto');
                document.getElementById('product_id').value="";
                $('#product_id').selectpicker('refresh');
                $("#prod_price").val("");
                $("#prod_stock").val("");
            }
        }
    });
}

$(document).on('keyup', '#prod_code', function() {
    var prod_code_input = $(this).val();
    if (prod_code_input !="") {
        if (prod_code_input.length >= 8) {
            obtener_registro(prod_code_input);
        }
    } else {
        document.getElementById('product_id').value="";
        $('#product_id').selectpicker('refresh');
    }
});

// #########################################################################################
    $(document).ready(function () {
    $("#agregar_producto_venta").click(function () {
        agregar();
    });
});

var cont=0;
total=0;
subtotal=[];

$("#registrar_venta").hide();

function agregar() {
    datosProducto = document.getElementById("product_id").value.split('_');

    product_id = datosProducto[0];
    producto= $("#product_id option:selected").text();
    quantity= $("#sade_quantity").val();
    discount= $("#sade_discount").val();
    price= $("#prod_price").val();
    stock= $("#prod_stock").val();
    impuesto= $("#sale_tax").val();

    if (product_id !="" && quantity !="" && quantity > 0 && discount !="" &&  price !="" &&  price > 0) {
        if (parseInt(stock) >= parseInt(quantity)) {

            var prod_buscar=0;
            var prod_id_array= document.getElementsByName('product_id[]');
            for (var i = 0; i < prod_id_array.length; i++){
                if (product_id==prod_id_array[i].value) {
                    prod_buscar=1;
                }
            }

            if (prod_buscar==0) {
            subtotal[cont]= (quantity*price) - (quantity*price*discount/100);
            total= total+subtotal[cont];
            var fila= '<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td><input type="hidden" name="sade_price[]" value="'+parseFloat(price).toFixed(2)+'"><input type="number" value="'+parseFloat(price).toFixed(2)+'" class="form-control" disabled></td> <td><input type="hidden" name="sade_discount[]" value="'+parseFloat(discount).toFixed(2)+'"><input type="number" value="'+parseFloat(discount).toFixed(2)+'" class="form-control" disabled></td> <td><input type="hidden" name="sade_quantity[]" value="'+quantity+'" class="form-control"><input type="number" name="sade_quantity[]" value="'+quantity+'" class="form-control" disabled></td> <td style="text-align:right;">S/ '+ parseFloat(subtotal[cont]).toFixed(2) +'</td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $("#venta_detalle").append(fila);
            }else{
                alert("Producto ya agregado!");
                limpiar();
            }
        } else {
        // Swal.fire({
        //     type: 'error',
        //     text: 'la cantidad a vender supera el stock',
        // })
        alert('la cantidad a vender supera el stock');
        }
    } else {
        // Swal.fire({
        //     type: 'error',
        //     text: 'Rellene todos los campos de la venta',
        // })
        alert('Rellene todos los campos de la venta');
    }
}

// #########################################################################################
function limpiar() {
    document.getElementById('product_id').value="";
    $('#product_id').selectpicker('refresh');
    $('#prod_code').val("");

    $('#sade_quantity').val("");
    $('#sade_discount').val("0");
    $('#prod_stock').val("");
    $('#prod_price').val("");
}

// #########################################################################################
function totales() {
    $('#total').html("PEN " + total.toFixed(2));
    total_impuesto= total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $('#total_impuesto_span').html("PEN " + total_impuesto.toFixed(2));
    // $('#total_impuesto').val(total_impuesto.toFixed(2));
    $('#total_pagar_span').html("PEN " + total_pagar.toFixed(2));
    $('#total_pagar').val(total_pagar.toFixed(2));
}

// #########################################################################################
function evaluar() {
    if (total>0) {
        $('#registrar_venta').show();
    } else {
        $('#registrar_venta').hide();
    }
}

// #########################################################################################
function eliminar(index) {
    total= total - subtotal[index];
    total_impuesto= total * impuesto / 100;
    total_pagar= total + total_impuesto;

    $('#total').html("PEN " + total.toFixed(2));
    $('#total_impuesto_span').html("PEN " + total_impuesto.toFixed(2));
    // $('#total_impuesto').val(total_impuesto.toFixed(2));
    $('#total_pagar_span').html("PEN " + total_pagar.toFixed(2));
    $('#total_pagar').val(total_pagar.toFixed(2));

    $("#fila"+index).remove();
    evaluar();
}
</script>
@endsection
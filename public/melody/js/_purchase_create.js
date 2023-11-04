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
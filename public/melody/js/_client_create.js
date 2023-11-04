function buscar_cliente(dni){
    $.ajax({
        url: "{{route('get_clients_by_dni')}}",
        type: "GET",
        data: {dni: dni},
        success:function(data) {
            if(Object.keys(data).length>0){
              $("#clie_name").val(data.clie_name);
              $("#clie_ruc").val(data.clie_ruc);
              $("#clie_address").val(data.clie_address);
              $("#clie_email").val(data.clie_email);
              $("#clie_phone").val(data.clie_phone);
            }else{
                alert("Cliente, no registrado");
                clear_client();
                $("#clie_name").focus();
            }
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
        clear_client();
    }
});

function clear_client() {
    $("#clie_name").val("");
    $("#clie_ruc").val("");
    $("#clie_address").val("");
    $("#clie_email").val("");
    $("#clie_phone").val("")
}
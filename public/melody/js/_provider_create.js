function buscar_provider(ruc){
    $.ajax({
        url: "{{route('get_providers_by_ruc')}}",
        type: "GET",
        data: {ruc: ruc},
        success:function(data) {
            if(Object.keys(data).length>0){
               $("#prov_name").val(data.prov_name);
               $("#prov_email").val(data.prov_email);
               $("#prov_ruc").val(data.prov_ruc);
               $("#prov_address").val(data.prov_address);
               $("#prov_phone").val(data.prov_phone);
            }else{
                alert("Proveedor, no registrado!");
                clear_provider();
                $("#prov_name").focus();
            }
        }
    });
}
$(document).on('keyup', '#prov_ruc', function() {
    var ruc_input = $(this).val();
    if (ruc_input !="") {
        if (ruc_input.length == 11) {
           alert("RUC: "+ruc_input);
           buscar_provider(ruc_input);
        }
    } else {
        clear_provider();
    }
});

function clear_provider() {
    // $("#prov_ruc").val("");
    $("#prov_name").val("");
    $("#prov_email").val("");
    $("#prov_address").val("");
    $("#prov_phone").val("");
}
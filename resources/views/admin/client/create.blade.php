@extends('layouts.admin')
@section('title','Registro de clientes')
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
            Registrar cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Cliente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar cliente</h4>
                    </div>
                    {!! Form::open(['route'=>'clients.store','method'=>'POST']) !!}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="clie_dni">DNI</label>
                            <input type="number" name="clie_dni" id="clie_dni" class="form-control" required autofocus value="{{old('clie_dni')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="clie_name">Nombre</label>
                            <input type="text" name="clie_name" id="clie_name" class="form-control" required value="{{old('clie_name')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="clie_ruc">RUC</label>
                            <input type="number" name="clie_ruc" id="clie_ruc" class="form-control" placeholder="opcional" value="{{old('clie_ruc')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="clie_email">Email</label>
                            <input type="email" name="clie_email" id="clie_email" class="form-control" placeholder="opcional" value="{{old('clie_email')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clie_phone">Celular</label>
                            <input type="number" name="clie_phone" id="clie_phone" class="form-control" placeholder="opcional" value="{{old('clie_phone')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clie_address">Dirección</label>
                            <input type="text" name="clie_address" id="clie_address" class="form-control" placeholder="opcional" value="{{old('clie_address')}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('clients.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- {!! Html::script('melody/js/_client_create.js') !!} --}}

<script>
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
                // alert("Cliente, no registrado");
                // clear_client();
                $("#clie_name").focus();
            }
        }
    });
}
$(document).on('keyup', '#clie_dni', function() {
    var dni_input = $(this).val();
    if (dni_input !="") {
        if (dni_input.length == 8) {
        //    alert("DNI: "+dni_input);
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
</script>
@endsection

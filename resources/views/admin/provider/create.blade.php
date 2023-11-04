@extends('layouts.admin')
@section('title','Registro de proveedor')
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
            Registrar proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar proveedor</h4>
                    </div>
                    {!! Form::open(['route'=>'providers.store','method'=>'POST']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="prov_ruc">RUC</label>
                            <input type="number" name="prov_ruc" id="prov_ruc" class="form-control" required autofocus value="{{old('prov_ruc')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prov_name">Nombre</label>
                            <input type="text" name="prov_name" id="prov_name" class="form-control" required value="{{old('prov_name')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="prov_email">Email</label>
                            <input type="email" name="prov_email" id="prov_email" class="form-control"
                                placeholder="ejemplo@gmail.com" required value="{{old('prov_email')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prov_phone">Número de Contacto</label>
                            <input type="number" name="prov_phone" id="prov_phone" class="form-control" required value="{{old('prov_phone')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prov_address">Dirección</label>
                            <input type="text" name="prov_address" id="prov_address" class="form-control" required value="{{old('prov_address')}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('providers.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- {!! Html::script('melody/js/_provider_create.js') !!} --}}

<script>
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
                // alert("Proveedor, no registrado!");
                // clear_provider();
                $("#prov_name").focus();
            }
        }
    });
}
$(document).on('keyup', '#prov_ruc', function() {
    var ruc_input = $(this).val();
    if (ruc_input !="") {
        if (ruc_input.length == 11) {
        //    alert("RUC: "+ruc_input);
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
</script>

@endsection
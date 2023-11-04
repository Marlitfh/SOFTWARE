@extends('layouts.admin')
@section('title','Edición de producto')
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
            Editar producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar producto</h4>
                    </div>
                    {!! Form::model($product, ['route'=>['products.update', $product],'method'=>'PUT','files'=>true])
                    !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="prod_name">Nombre</label>
                            <input type="text" name="prod_name" id="prod_name" value="{{$product->prod_name}}"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="prod_price">Precio de venta</label>
                            <input type="number" name="prod_price" id="prod_price" value="{{$product->prod_price}}"
                                class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="prod_expiration">Vencimiento</label>
                            <input type="date" name="prod_expiration" id="prod_expiration" class="form-control" value="{{$product->prod_expiration}}">
                        </div>
                        {{-- <div class="form-group col-md-2">
                            <label for="prod_status">Estado</label>
                            <select name="prod_status" id="prod_status" class="form-control">
                                <option value="ACTIVE" @if ('ACTIVE'==$product->prod_status) selected @endif>ACTIVE</option>
                                <option value="IMPERFECT" @if ('IMPERFECT'==$product->prod_status) selected @endif>DAÑADO</option>
                                <option value="EXPIRED" @if ('EXPIRED'==$product->prod_status) selected @endif>OBSOLETO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="prod_status_cant">Dañado</label>
                            <input type="number" name="prod_status_cant" id="prod_status_cant" value="{{$product->prod_status_cant}}" class="form-control" required>
                        </div> --}}
                    </div>
                    {{-- <div class="row" style="display: none;">
                        <div class="form-group col-md-2">
                            <input type="number" name="prod_stock1" id="prod_stock1" value="{{$product->prod_stock}}" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" name="prod_status_cant1" id="prod_status_cant1" value="{{$product->prod_status_cant}}" readonly>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="category_id">Categoría</label>
                            <select name="category_id" id="category_id" class="form-control selectpicker"
                                data-live-search="true">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if ($category->id==$product->category_id) selected
                                    @endif>
                                    {{$category->cate_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-body pt-0 col-md-6">
                            <h4 class="card-title d-flex m-0">Seleccionar nueva imagen</h4>
                            <input type="file" name="picture" id="picture" class="dropify" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
                    <a href="{{route('products.index')}}" class="btn btn-dark">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// var select = document.getElementById('prod_status');

// if (select.value=='ACTIVE' || select.value=='EXPIRED') {
//     document.getElementById('prod_status_cant').disabled=true;
// }else{
//     document.getElementById('prod_status_cant').disabled=false;
// }

// select.addEventListener('change', function(){
//     var selectedOption = this.options[select.selectedIndex];
//     if(selectedOption.value == 'ACTIVE' || select.value=='EXPIRED'){
//         document.getElementById('prod_status_cant').disabled=true;
//         document.getElementById('prod_status_cant').value=0;
//     }else{
//         document.getElementById('prod_status_cant').disabled=false;
//     }
// });

</script>
@endsection
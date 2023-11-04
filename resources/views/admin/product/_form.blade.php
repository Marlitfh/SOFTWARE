<div class="row">
    <div class="form-group col-md-6">
        <label for="prod_name">Nombre</label>
        <input type="text" name="prod_name" id="prod_name" class="form-control" required value="{{old('prod_name')}}">
    </div>
    <div class="form-group col-md-4">
        <label for="prod_code">Código de barras</label>
        <input type="text" name="prod_code" id="prod_code" class="form-control" placeholder="opcional"
            value="{{old('prod_code')}}">
    </div>
    <div class="form-group col-md-2">
        <label for="prod_price">Precio de venta</label>
        <input type="number" name="prod_price" id="prod_price" class="form-control" required
            value="{{old('prod_price')}}">
    </div>
    {{-- <div class="form-group col-md-2">
        <label for="prod_expiration">Vencimiento</label>
        <input type="date" name="prod_expiration" id="prod_expiration" class="form-control" value="{{old('prod_expiration')}}" required>
    </div> --}}
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label for="category_id">Categoría</label>
        <select name="category_id" id="category_id" class="form-control selectpicker" data-live-search="true" required>
            <option value="" selected disabled>Seleccionar categoría</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->cate_name}}</option>
            @endforeach
        </select>
    </div>
    {{-- <div class="form-group col-md-6">
        <label for="prod_fechaven">fecha vencimiento</label>
        <input type="date" name="prod_fechaven" id="prod_fechaven" class="form-control" value="{{old('prod_fechaven')}}">
</div> --}}
    <div class="card-body pt-0 col-md-6">
        <h4 class="card-title d-flex m-0" style="font-size: 0.9em;">Seleccionar imagen</h4>
        <input type="file" name="picture" id="picture" class="dropify" accept="image/*">
    </div>
</div>
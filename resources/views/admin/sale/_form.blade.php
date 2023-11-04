<div class="row">
    <div class="form-group col-5">
        <label for="clie_dni">DNI cliente</label>
        <input type="number" name="clie_dni" id="clie_dni" class="form-control p-2" placeholder="buscar por DNI">
    </div>
    <div class="form-group col-7">
        <label for="provider_id">Cliente <sup style="color: #f00;">**</sup> </label>
        <select name="client_id" id="client_id" class="form-control selectpicker" data-live-search="true" required>
            <option value="" selected disabled>Seleccionar cliente</option>
            @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->clie_name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-5">
        <label for="prod_code">Código de barras</label>
        <input type="text" name="prod_code" id="prod_code" class="form-control p-2">
    </div>

    <div class="form-group col-7">
        <label for="product_id">Producto <sup style="color: #f00;">**</sup> </label>
        <select name="" id="product_id" class="form-control selectpicker" data-live-search="true">
            <option value="" disabled selected>Seleccionar producto</option>
            @foreach ($products as $product)
            <option value="{{$product->id}}_{{$product->prod_stock}}_{{$product->prod_price}}_{{$product->prod_code}}">
                {{$product->prod_name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-2">
        <label for="prod_stock">Stock actual <sup style="color: #f00;">**</sup> </label>
        <input type="text" name="" id="prod_stock" value="" class="form-control" disabled>
    </div>
    <div class="form-group col-md-2">
        <label for="sade_quantity">Cantidad <sup style="color: #f00;">**</sup> </label>
        <input type="number" name="" id="sade_quantity" class="form-control">
    </div>
    <div class="form-group col-md-2">
        <label for="prod_price">Precio de venta <sup style="color: #f00;">**</sup> </label>
        <input type="number" name="" id="prod_price" class="form-control" disabled>
    </div>
    <div class="form-group col-md-2">
        <label for="sale_tax">Impuesto <sup style="color: #f00;">**</sup> </label>
        <input type="number" name="sale_tax" id="sale_tax" class="form-control" placeholder="0%" value="0" required>
    </div>
    <div class="form-group col-md-2">
        <label for="sade_discount">Porcentaje de descuento <sup style="color: #f00;">**</sup> </label>
        <input type="number" name="" id="sade_discount" class="form-control" value="0">
    </div>
</div>

<div class="form-group">
    <button type="button" class="btn btn-success float-right" id="agregar_producto_venta">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalle de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="venta_detalle" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta (PEN)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal (PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p style="text-align:right;">TOTAL:</p>
                    </th>
                    <th>
                        <p style="text-align:right;">
                            <span style="text-align:right;" id="total">PEN 0.00</span>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p style="text-align:right;">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p style="text-align:right;">
                            <span style="text-align:right;" id="total_impuesto_span">PEN 0.00</span>
                            {{-- <input type="number" name="sale_tax" id="total_impuesto"> --}}
                        </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p style="text-align:right;">TOTAL A PAGAR:</p>
                    </th>
                    <th>
                        <p style="text-align:right;">
                            <span style="text-align:right;" id="total_pagar_span">PEN 0.00</span>
                            <input type="hidden" name="sale_total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
<div class="form-group col-6">
    <label for="provider_id">Proveedor</label>
    <select name="provider_id" id="provider_id" class="form-control selectpicker" data-live-search="true" required>
        <option value="" selected disabled>Seleccionar proveedor</option>
        @foreach ($providers as $provider)
        <option value="{{$provider->id}}">{{$provider->prov_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-6">
    <label for="product_id">Producto</label>
    <select name="" id="product_id" class="form-control selectpicker" data-live-search="true"> 
        <option value="" selected disabled>Seleccionar producto</option>
        @foreach ($products as $product)
        <option value="{{$product->id}}">{{$product->prod_name}}</option>
        @endforeach
    </select>
</div>
</div>
<div class="row">
<div class="form-group col-4">
    <label for="purc_tax">Impuesto</label>
    <input type="number" name="purc_tax" id="purc_tax" class="form-control" placeholder="18%" value="0" required>
</div>

<div class="form-group col-4">
    <label for="pude_quantity">Cantidad</label>
    <input type="number" name="" id="pude_quantity" class="form-control">
</div>
<div class="form-group col-4">
    <label for="pude_price">Precio de compra</label>
    <input type="number" name="" id="pude_price" class="form-control">
</div>
</div>
<div class="form-group">
    <button type="button" class="btn btn-success float-right" id="agregar_producto">Agregar producto</button>
</div>
<div class="form-group">
    <h4 class="card-title">Detalle de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="compra_detalle" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p style="text-align:right;">TOTAL:</p>
                    </th>
                    <th>
                        <p style="text-align:right;">
                            <span style="text-align:right;" id="total">PEN 0.00</span>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p style="text-align:right;">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p style="text-align:right;">
                            <span style="text-align:right;" id="total_impuesto">PEN 0.00</span>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p style="text-align:right;">TOTAL A PAGAR:</p>
                    </th>
                    <th>
                        <p style="text-align:right;">
                            <span style="text-align:right;" id="total_pagar_span">PEN 0.00</span>
                            <input type="hidden" name="purc_total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

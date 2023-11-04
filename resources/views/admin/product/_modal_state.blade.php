<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog mt-2" role="document">
        <div class="modal-content">
            <div class="modal-header p-2">
                <h5 class="modal-title" id="exampleModalLabel-2">Registrar estado de producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>

            {!! Form::open(['route'=>'productstatedetails.store','method'=>'POST']) !!}
            <div class="modal-body p-2">
                <div class="form-group mb-2">
                    <label for="product_id">Producto</label>
                    <select name="product_id" id="product_id" class="form-control selectpicker" data-live-search="true" required> 
                        <option value="" selected disabled>Seleccionar producto</option>
                        @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->prod_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group mb-2 col-md-9">
                        <label for="product_state_id">Estado</label>
                        <select name="product_state_id" id="product_state_id" class="form-control selectpicker" data-live-search="true" required> 
                            <option value="" selected disabled>Seleccionar Estado</option>
                            @foreach ($states as $state)
                            {{-- @if ($state->id > 1) --}}
                            {{-- <option value="{{$state->id}}">@if ($state->id==2)Dañado @else Obsoleto @endif </option> --}}
                            <option value="{{$state->id}}">{{$state->prod_stat_state}}</option>
                            {{-- @endif --}}
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2 col-md-3">
                      <label for="prod_stat_deta_cantidad">Cantidad</label>
                      <input type="number" name="prod_stat_deta_cantidad" id="prod_stat_deta_cantidad"  class="form-control p-2" required>
                    </div>
                </div>
                {{-- <div class="form-group mb-2">
                    <input type="date" name="prod_stat_deta_prod_expiration" id="prod_stat_deta_prod_expiration" class="form-control p-2">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



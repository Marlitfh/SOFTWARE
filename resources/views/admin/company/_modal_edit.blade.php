<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog mt-2" role="document">
        <div class="modal-content">
            <div class="modal-header p-2">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-window-close"></i>
                </button>
            </div>

            {!! Form::model($company, ['route'=>['companies.update', $company],'method'=>'PUT','files'=>true]) !!}
            <div class="modal-body p-2">
                <div class="form-group mb-2">
                    <label for="comp_name">Nombre</label>
                    <input type="text" name="comp_name" id="comp_name" class="form-control p-2" value="{{$company->comp_name}}"
                        required>
                </div>
                <div class="form-group mb-2">
                    <label for="comp_description">Descripción</label>
                    <textarea class="form-control p-2" name="comp_description" id="comp_description"
                        rows="3">{{$company->comp_description}}</textarea>
                </div>

                <div class="row">
                    <div class="form-group mb-2 col-md-4">
                        <label for="comp_email">Correo</label>
                        <input type="email" name="comp_email" id="comp_email" class="form-control p-2"
                            value="{{$company->comp_email}}">
                    </div>

                    <div class="form-group mb-2 col-md-4">
                        <label for="comp_address">dirección</label>
                        <input type="text" name="comp_address" id="comp_address" class="form-control p-2"
                            value="{{$company->comp_address}}">
                    </div>

                    <div class="form-group mb-2 col-md-4">
                        <label for="comp_ruc">RUC</label>
                        <input type="number" name="comp_ruc" id="comp_ruc" class="form-control p-2"
                            value="{{$company->comp_ruc}}">
                    </div>
                </div>

                <div class="form-group mb-0">
                    <h5 class="card-title d-flex m-0" style="font-size: 14px;">SELECCIONAR LOGO</h5>
                    <input type="file" name="picture" id="picture" class="dropify m-0" accept="image/*">
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
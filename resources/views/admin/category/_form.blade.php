<div class="form-group">
    <label for="cate_name">Nombre</label>
<input type="text" name="cate_name" id="cate_name" class="form-control" placeholder="Nombre" required value="{{old('cate_name')}}">
</div>

<div class="form-group">
    <label for="cate_description">Descripción</label>
    <textarea class="form-control" name="cate_description" id="cate_description" rows="3" placeholder="opcional">{{old('cate_description')}}</textarea>
</div>
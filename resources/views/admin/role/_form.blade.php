<div class="form-group">
    <label for="">Permisos especiales</label><br>
    <label for="">{!! Form::radio('special', 'all-access') !!} Acceso total</label>
    <label for="">{!! Form::radio('special', 'no-access') !!} Ningún acceso</label>

    {{-- <label for="">{!! Form::checkbox('special', 'all-access') !!} Acceso total</label>
    <label for="">{!! Form::checkbox('special', 'no-access') !!} Ningún acceso</label> --}}
</div>

<div class="form-group">
    <label for="">Lista de permisos</label>
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
        <li>
            <label for="">
                {{-- laravel collective --}}
                {!! Form::checkbox('permissions[]',$permission->id, null) !!}
                {{$permission->name}}
                <em>{{$permission->description}}</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>

{{-- codigo de edición usando mismo form --}}
{{-- {{old('name', $rol ? $rol->name : '')}} --}}
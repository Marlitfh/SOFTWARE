<div class="form-group">
    <label for="">Lista de roles</label>
    <ul class="list-unstyled">
        @foreach ($roles as $role)
        <li>
            <label for="">
                {{-- laravel collective --}}
                {!! Form::checkbox('roles[]',$role->id, null) !!}
                {{$role->name}}
                <em>({{$role->description}})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
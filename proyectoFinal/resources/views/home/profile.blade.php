@extends('home.home')

@section('page')

    <div  class="container mt-5 mb-5">
        <div  class="row col-md-offset-2">
            <div  class="col col-6 col-md-6 offset-md-3 pt-3 pb-3">
                <div class="panel panel-default">
                    <div class="panel-body pt-2 pb-2 pr-2 pl-2" id="registro">
                        @foreach($user as $item)
                        <div class="form-group row has-feedback">
                            {!! Form::label('nombre', 'Nombre', ['class' =>'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('nombre'))
                                    {!! Form::text('nombre', $item->nombre, ['class' => 'form-control border border-danger', 'placeholder' => 'Nombre', 'id' => 'nombre']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('nombre', $item->nombre , ['class' => 'form-control', 'placeholder' => 'Nombre','id' => 'nombre']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('apellidos'))
                                    {!! Form::text('apellidos', $item->apellidos, ['class' => 'form-control border border-danger', 'placeholder' => 'Apellidos', 'id' => 'apellidos']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('apellidos', $item->apellidos, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'id' => 'apellidos']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('fecha_nacimiento'))
                                    {!! Form::date('fecha_nacimiento', $item->fecha_nacimiento, ['class' => 'form-control border border-danger', 'placeholder' => 'Fecha Nacimiento', 'id' => 'fecha_nacimiento']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::date('fecha_nacimiento', $item->fecha_nacimiento, ['class' => 'form-control', 'placeholder' => 'Fecha Nacimiento', 'id' => 'fecha_nacimiento']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('email'))
                                    {!! Form::email('email', $item->email, ['class' => 'form-control border border-danger', 'placeholder' => 'Email', 'id' => 'email']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::email('email', $item->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('username', 'Usuario', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('username'))
                                    {!! Form::text('username', $item->username, ['class' => 'form-control border border-danger', 'placeholder' => 'Usuario', 'id' => 'username']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('username', $item->username, ['class' => 'form-control', 'placeholder' => 'Usuario', 'id' => 'username']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                @if($errors->has('contrasenya'))
                                    {{
                                        Form::macro('inputContra', function($contra){
                                           return '<input type="hidden" class="form-control border border-danger" placeholder="Contraseña" name="contrasenya" id="password" value="' . $contra . '" /><i class="oi oi-x" style="color: red"></i>';
                                       })
                                   }}
                                @else
                                    {{
                                        Form::macro('inputContra', function($contra){
                                            return '<input type="hidden" class="form-control" placeholder="Contraseña" name="contrasenya" id="password" value="' . $contra . '" />';
                                        })
                                    }}
                                @endif
                                {!! Form::inputContra($item->password) !!}
                                <span class="text-danger">{{ $errors->first('contrasenya') }}</span>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-10 mt-3 ">
                                {!! Form::submit('Actualizar', ['class' => 'btn btn-dark ', 'id' => 'actualizar']) !!}
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection